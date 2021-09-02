package com.pddstudio.openpocket;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.design.widget.TabLayout;
import android.support.v4.view.LayoutInflaterCompat;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;

import com.crashlytics.android.Crashlytics;
import com.github.clans.fab.FloatingActionButton;
import com.mikepenz.community_material_typeface_library.CommunityMaterial;
import com.mikepenz.iconics.IconicsDrawable;
import com.mikepenz.iconics.context.IconicsLayoutInflater;
import com.mikepenz.materialdrawer.AccountHeader;
import com.mikepenz.materialdrawer.AccountHeaderBuilder;
import com.mikepenz.materialdrawer.Drawer;
import com.mikepenz.materialdrawer.DrawerBuilder;
import com.mikepenz.materialdrawer.model.ProfileDrawerItem;
import com.pddstudio.openpocket.adapters.ViewPagerAdapter;
import com.pddstudio.openpocket.utils.DrawerUtils;
import com.pddstudio.openpocket.views.CoordinatorBalanceView;
import com.pddstudio.openpocket.views.CustomAppBarLayout;
import com.pddstudio.pocketlibrary.OpenPocket;
import com.pddstudio.pocketlibrary.models.Profile;
import com.pddstudio.pocketlibrary.models.Transaction;
import com.pddstudio.pocketutils.DateUtils;
import com.pddstudio.pocketutils.Preferences;

import io.fabric.sdk.android.Fabric;
import io.inject.InjectView;
import io.inject.Injector;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    private static final int ADD_TRANSACTION_CODE = 42;

    private Toolbar toolbar;
    @InjectView(R.id.balanceView) private CoordinatorBalanceView coordinatorBalanceView;
    @InjectView(R.id.tabLayout) private TabLayout tabLayout;
    @InjectView(R.id.viewPager) private ViewPager viewPager;
    @InjectView(R.id.floatingActionButton) private FloatingActionButton floatingActionButton;
    @InjectView(R.id.appBarLayout) private CustomAppBarLayout appBarLayout;
    @InjectView(R.id.collapsingToolbarLayout) private CollapsingToolbarLayout collapsingToolbarLayout;

    private Drawer drawer;
    private AccountHeader accountHeader;
    private ViewPagerAdapter viewPagerAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        LayoutInflaterCompat.setFactory(getLayoutInflater(), new IconicsLayoutInflater(getDelegate()));
        super.onCreate(savedInstanceState);
        Fabric.with(this, new Crashlytics());

        //init preferences
        Preferences.init(this);

        //set the layout
        setContentView(R.layout.activity_main);

        //bind the views
        Injector.inject(this);
        toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle(R.string.app_name);
        setSupportActionBar(toolbar);

        //initialize pocket library
        OpenPocket.init(this);

        //build the navigation drawer
        buildNavigationDrawer(savedInstanceState);

        appBarLayout.setScrollingEnabled(false);

        //setup the view pager
        viewPagerAdapter = new ViewPagerAdapter(getSupportFragmentManager());
        viewPager.setAdapter(viewPagerAdapter);
        viewPager.addOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {}

            @Override
            public void onPageSelected(int position) {
                toolbar.setSubtitle(viewPagerAdapter.getPageTitle(position).toString() + " " + DateUtils.getCurrentYear());
            }

            @Override
            public void onPageScrollStateChanged(int state) {}
        });
        tabLayout.setupWithViewPager(viewPager);

        //switch to the current month
        viewPager.setCurrentItem(DateUtils.getCurrentMonth(), true);

        //setup the fab
        floatingActionButton.setImageDrawable(new IconicsDrawable(this).icon(CommunityMaterial.Icon.cmd_plus).color(Color.WHITE).sizeDp(18));
        floatingActionButton.setOnClickListener(this);

    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        //save the drawer values to restore it later if needed
        outState = drawer.saveInstanceState(outState);
        outState = accountHeader.saveInstanceState(outState);
        super.onSaveInstanceState(outState);
    }

    @Override
    public void onBackPressed() {
        if(drawer.isDrawerOpen()) {
            drawer.closeDrawer();
        } else {
            this.finish();
            System.exit(0);
        }
    }

    private void buildNavigationDrawer(Bundle savedInstance) {

        accountHeader = new AccountHeaderBuilder().withActivity(this).withHeaderBackground(R.color.colorPrimary).build();

        Profile activeProfile = OpenPocket.get().getActiveProfile();
        ProfileDrawerItem activeProfileItem = new ProfileDrawerItem().withName(activeProfile.getProfileName()).withEmail(activeProfile.getProfileDescription());
        accountHeader.setActiveProfile(activeProfileItem);

        for(Profile profile : OpenPocket.get().getProfileManager().getProfileList()) {
            ProfileDrawerItem profileDrawerItem = new ProfileDrawerItem().withName(profile.getProfileName()).withEmail(profile.getProfileDescription());
            accountHeader.addProfiles(profileDrawerItem);
        }

        drawer = new DrawerBuilder()
                .withActivity(this)
                .withToolbar(toolbar)
                .withSavedInstance(savedInstance)
                .withActionBarDrawerToggleAnimated(true)
                .withAccountHeader(accountHeader)
                .withFullscreen(false)
                .withDrawerItems(DrawerUtils.getDrawerItems())
                .withSelectedItem(DrawerUtils.ITEM_HOME)
                .build();
    }

    @Override
    public void onClick(View v) {
        //handle clicks depending on the clicked view
        switch (v.getId()) {
            case R.id.floatingActionButton:
                Intent intent = new Intent(this, TransactionActivity.class);
                startActivityForResult(intent, ADD_TRANSACTION_CODE);
                break;
            default:
                break;
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if(requestCode == ADD_TRANSACTION_CODE && resultCode == RESULT_OK) {
            Log.d("MainActivity", "Received RESULT_OK");
            Transaction transaction = (Transaction) data.getSerializableExtra(TransactionActivity.TRANSACTION_ITEM);
            if(transaction.getMoneyAmount() < 0) {
                float balance = coordinatorBalanceView.getBalanceAmount() - transaction.getMoneyAmount();
                coordinatorBalanceView.setCurrentBalance(balance);
            } else {
                float balance = coordinatorBalanceView.getBalanceAmount() + transaction.getMoneyAmount();
                coordinatorBalanceView.setCurrentBalance(balance);
            }
            viewPagerAdapter.reloadItemData();
        }
    }

}
