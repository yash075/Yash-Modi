package com.ey.ecare.bean;

public class CredentialsBean {
    private String userId;
    private String password;
    private String userType;
    private int loginStatus;

    public CredentialsBean() {
    }

    public CredentialsBean(String userId, String password, String userType) {
        this.userId = userId;
        this.password = password;
        this.userType = userType;
    }

    public CredentialsBean(String userId, String password, String userType, int loginStatus) {
        this.userId = userId;
        this.password = password;
        this.userType = userType;
        this.loginStatus = loginStatus;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getUserType() {
        return userType;
    }

    public void setUserType(String userType) {
        this.userType = userType;
    }

    public int getLoginStatus() {
        return loginStatus;
    }

    public void setLoginStatus(int loginStatus) {
        this.loginStatus = loginStatus;
    }

}
