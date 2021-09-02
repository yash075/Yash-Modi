package com.ey.ecare.bean;

import com.ey.ecare.dao.*;

import java.util.ArrayList;
import java.util.Date;

public class DoctorBean {
    private int doctorId;
    private String doctorName;
    private Date dateOfBirth;
    private Date dateOfJoining;
    private String gender;
    private String qualification;
    private String specialization;
    private int yearsOfExperience;
    private String street;
    private String location;
    private String city;
    private String state;
    private String pincode;
    private String contactNumber;
    private String emailId;

    public DoctorBean() {
    }

    public DoctorBean(int doctorId, String doctorName) {
        this.doctorId = doctorId;
        this.doctorName = doctorName;
    }

    public DoctorBean(int doctorId, String doctorName, String specialization) {
        this.doctorId = doctorId;
        this.doctorName = doctorName;
        this.specialization = specialization;
    }

    public DoctorBean(int doctorId, String doctorName, Date dateOfBirth, Date dateOfJoining, String gender, String qualification, String specialization, int yearsOfExperience, String street, String location, String city, String state, String pincode, String contactNumber, String emailId) {
        this.doctorId = doctorId;
        this.doctorName = doctorName;
        this.dateOfBirth = dateOfBirth;
        this.dateOfJoining = dateOfJoining;
        this.gender = gender;
        this.qualification = qualification;
        this.specialization = specialization;
        this.yearsOfExperience = yearsOfExperience;
        this.street = street;
        this.location = location;
        this.city = city;
        this.state = state;
        this.pincode = pincode;
        this.contactNumber = contactNumber;
        this.emailId = emailId;
    }

    public int getDoctorId() {
        return doctorId;
    }

    public void setDoctorId(int doctorId) {
        this.doctorId = doctorId;
    }

    public String getDoctorName() {
        return doctorName;
    }

    public void setDoctorName(String doctorName) {
        this.doctorName = doctorName;
    }

    public Date getDateOfBirth() {
        return dateOfBirth;
    }

    public void setDateOfBirth(Date dateOfBirth) {
        this.dateOfBirth = dateOfBirth;
    }

    public Date getDateOfJoining() {
        return dateOfJoining;
    }

    public void setDateOfJoining(Date dateOfJoining) {
        this.dateOfJoining = dateOfJoining;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public String getQualification() {
        return qualification;
    }

    public void setQualification(String qualification) {
        this.qualification = qualification;
    }

    public String getSpecialization() {
        return specialization;
    }

    public void setSpecialization(String specialization) {
        this.specialization = specialization;
    }

    public int getYearsOfExperience() {
        return yearsOfExperience;
    }

    public void setYearsOfExperience(int yearsOfExperience) {
        this.yearsOfExperience = yearsOfExperience;
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

    public String getContactNumber() {
        return contactNumber;
    }

    public void setContactNumber(String contactNumber) {
        this.contactNumber = contactNumber;
    }

    public String getEmailId() {
        return emailId;
    }

    public void setEmailId(String emailId) {
        this.emailId = emailId;
    }

    public void displayDoctorBean(){
        ArrayList<DoctorBean> doctorBeanArrayList = Administrator.getDoctorBean();
        System.out.println("DoctorId , DoctorName , DateOfBirth , DateOfJoining , Gender , " +
                "Qualification , Specialization , YearsOfExperience , Street , " +
                "Location , City , State , Pincode , ContactNumber , EmailId");
        System.out.println("----------------------------------------------------------------------------" +
                "----------------------------------------------------");
        for(DoctorBean doctorBean : doctorBeanArrayList){
            System.out.println(doctorBean.getDoctorId()+" , "+
                    doctorBean.getDoctorName()+" , "+doctorBean.getDateOfBirth()+" , "+
                    doctorBean.getDateOfJoining()+" , "+doctorBean.getGender() +" , "+
                    doctorBean.getQualification()+" , "+doctorBean.getSpecialization()+" , "+
                    doctorBean.getYearsOfExperience()+" , "+doctorBean.getStreet()+" , "+
                    doctorBean.getLocation()+" , "+doctorBean.getCity()+" , "+
                    doctorBean.getState()+" , "+doctorBean.getPincode()+" , "+
                    doctorBean.getContactNumber()+" , "+doctorBean.getEmailId());
        }
        System.out.println("----------------------------------------------------------------------------" +
                "----------------------------------------------------");
    }
    public void displayDoctorBeanSpecial(){
        ArrayList<DoctorBean> doctorBeanArrayList = Administrator.getDoctorBean();
        System.out.println("DoctorId , DoctorName , Specialization , ContactNumber , EmailId");
        System.out.println("----------------------------------------------------------------------------" +
                "----------------------------------------------------");
        for(DoctorBean doctorBean : doctorBeanArrayList){
            System.out.println(doctorBean.getDoctorId()+" , "+
                    doctorBean.getDoctorName()+" , "+doctorBean.getSpecialization()+" , "+
                    doctorBean.getYearsOfExperience()+" , "+
                    doctorBean.getContactNumber()+" , "+doctorBean.getEmailId());
        }
        System.out.println("----------------------------------------------------------------------------" +
                "----------------------------------------------------");
    }
}