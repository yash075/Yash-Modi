package com.ey.ecare.bean;

import java.util.ArrayList;
import java.util.Date;

public class PatientBean {
    private int patientId;
    private String userId;
    private ProfileBean profileBeans;
    private Date appointmentDate;
    private String alimentType;
    private String alimentDetails;
    private String diagnosisHistory;

    public PatientBean() {
    }

    public PatientBean(ProfileBean profileBeans, Date appointmentDate, String alimentType, String alimentDetails, String diagnosisHistory) {
        this.profileBeans = profileBeans;
        this.appointmentDate = appointmentDate;
        this.alimentType = alimentType;
        this.alimentDetails = alimentDetails;
        this.diagnosisHistory = diagnosisHistory;
    }

    public PatientBean(int patientId, ProfileBean profileBeans, Date appointmentDate, String alimentType, String alimentDetails, String diagnosisHistory) {
        this.patientId = patientId;
        this.profileBeans = profileBeans;
        this.appointmentDate = appointmentDate;
        this.alimentType = alimentType;
        this.alimentDetails = alimentDetails;
        this.diagnosisHistory = diagnosisHistory;
    }

    public PatientBean(int patientId, String userId, Date appointmentDate, String alimentType, String alimentDetails, String diagnosisHistory) {
        this.patientId = patientId;
        this.userId = userId;
        this.appointmentDate = appointmentDate;
        this.alimentType = alimentType;
        this.alimentDetails = alimentDetails;
        this.diagnosisHistory = diagnosisHistory;
    }

    public int getPatientId() {
        return patientId;
    }

    public void setPatientId(int patientId) {
        this.patientId = patientId;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }

    public Date getAppointmentDate() {
        return appointmentDate;
    }

    public void setAppointmentDate(Date appointmentDate) {
        this.appointmentDate = appointmentDate;
    }

    public String getAlimentType() {
        return alimentType;
    }

    public void setAlimentType(String alimentType) {
        this.alimentType = alimentType;
    }

    public String getAlimentDetails() {
        return alimentDetails;
    }

    public void setAlimentDetails(String alimentDetails) {
        this.alimentDetails = alimentDetails;
    }

    public String getDiagnosisHistory() {
        return diagnosisHistory;
    }

    public void setDiagnosisHistory(String diagnosisHistory) {
        this.diagnosisHistory = diagnosisHistory;
    }

    public ProfileBean getProfileBeans() {
        return profileBeans;
    }

    public void setProfileBeans(ProfileBean profileBeans) {
        this.profileBeans = profileBeans;
    }
}
