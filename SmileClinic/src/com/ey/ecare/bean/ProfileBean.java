package com.ey.ecare.bean;

import com.ey.ecare.dao.*;

import java.util.ArrayList;
import java.util.Date;

public class ProfileBean {
    private String userId;
    private String firstName;
    private String lastName;
    private Date dateOfbirth;
    private String gender;
    private String street;
    private String location;
    private String city;
    private String state;
    private String pincode;
    private String mobileNo;
    private String emailId;

    public ProfileBean() {
    }

    public ProfileBean(String userId, String firstName) {
        this.userId = userId;
        this.firstName = firstName;
    }

    public ProfileBean(String userId, String firstName, String lastName, Date dateOfbirth, String gender, String street, String location, String city, String state, String pincode, String mobileNo, String emailId) {
        this.userId = userId;
        this.firstName = firstName;
        this.lastName = lastName;
        this.dateOfbirth = dateOfbirth;
        this.gender = gender;
        this.street = street;
        this.location = location;
        this.city = city;
        this.state = state;
        this.pincode = pincode;
        this.mobileNo = mobileNo;
        this.emailId = emailId;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    public Date getDateOfbirth() {
        return dateOfbirth;
    }

    public void setDateOfbirth(Date dateOfbirth) {
        this.dateOfbirth = dateOfbirth;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public String getStreet() {
        return street;
    }

    public void setStreet(String street) {
        this.street = street;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public String getCity() {
        return city;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public String getState() {
        return state;
    }

    public void setState(String state) {
        this.state = state;
    }

    public String getPincode() {
        return pincode;
    }

    public void setPincode(String pincode) {
        this.pincode = pincode;
    }

    public String getMobileNo() {
        return mobileNo;
    }

    public void setMobileNo(String mobileNo) {
        this.mobileNo = mobileNo;
    }

    public String getEmailId() {
        return emailId;
    }

    public void setEmailId(String emailId) {
        this.emailId = emailId;
    }

    public void displayProfileBean(){
        ArrayList<ProfileBean> profileBeanArrayList = Administrator.getProfileBean();
        for(ProfileBean profileBean : profileBeanArrayList){
            System.out.println(profileBean.getUserId()+" , "+
                    profileBean.getFirstName()+" , "+profileBean.getLastName()+" , "+
                    profileBean.getDateOfbirth()+" , "+profileBean.getGender() +" , "+
                    profileBean.getStreet()+" , "+profileBean.getLocation()+" , "+
                    profileBean.getCity()+" , "+profileBean.getState()+" , "+
                    profileBean.getPincode()+" , "+profileBean.getMobileNo()+" , "+
                    profileBean.getEmailId());
        }
    }

    public void displayProfileBean(String userId){
        ArrayList<ProfileBean> profileBeanArrayList = Patient.getProfileBean(userId);
        System.out.println("UserId , FirstName , LastName , DateOfBirth , Gender , " +
                "Street , Location , City , State , Pincode , ContactNumber , EmailId");
        System.out.println("----------------------------------------------------------------------------" +
                "----------------------------------------------------");
        for(ProfileBean profileBean : profileBeanArrayList){
            System.out.println(profileBean.getUserId()+" , "+
                    profileBean.getFirstName()+" , "+profileBean.getLastName()+" , "+
                    profileBean.getDateOfbirth()+" , "+profileBean.getGender() +" , "+
                    profileBean.getStreet()+" , "+profileBean.getLocation()+" , "+
                    profileBean.getCity()+" , "+profileBean.getState()+" , "+
                    profileBean.getPincode()+" , "+profileBean.getMobileNo()+" , "+
                    profileBean.getEmailId());
        }
        System.out.println("----------------------------------------------------------------------------" +
                "----------------------------------------------------");
    }

}
