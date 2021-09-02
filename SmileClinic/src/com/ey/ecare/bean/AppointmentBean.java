package com.ey.ecare.bean;

import com.ey.ecare.dao.*;

import java.util.ArrayList;
import java.util.Date;

public class AppointmentBean {
    private int appointmentId;
    private int doctorId;
    private DoctorBean doctorBean;
    private int patientId;
    private PatientBean patientBean;
    private Date appointmentDate;
    private String appointmentTime;

    public AppointmentBean() {
    }

    public AppointmentBean(int appointmentId, DoctorBean doctorBean, PatientBean patientBean, Date appointmentDate, String appointmentTime) {
        this.appointmentId = appointmentId;
        this.doctorBean = doctorBean;
        this.patientBean = patientBean;
        this.appointmentDate = appointmentDate;
        this.appointmentTime = appointmentTime;
    }

    public AppointmentBean(int appointmentId, int doctorId, int patientId, Date appointmentDate, String appointmentTime) {
        this.appointmentId = appointmentId;
        this.doctorId = doctorId;
        this.patientId = patientId;
        this.appointmentDate = appointmentDate;
        this.appointmentTime = appointmentTime;
    }

    public int getAppointmentId() {
        return appointmentId;
    }

    public void setAppointmentId(int appointmentId) {
        this.appointmentId = appointmentId;
    }

    public int getDoctorId() {
        return doctorId;
    }

    public void setDoctorId(int doctorId) {
        this.doctorId = doctorId;
    }

    public int getPatientId() {
        return patientId;
    }

    public void setPatientId(int patientId) {
        this.patientId = patientId;
    }

    public Date getAppointmentDate() {
        return appointmentDate;
    }

    public void setAppointmentDate(Date appointmentDate) {
        this.appointmentDate = appointmentDate;
    }

    public String getAppointmentTime() {
        return appointmentTime;
    }

    public void setAppointmentTime(String appointmentTime) {
        this.appointmentTime = appointmentTime;
    }

    public DoctorBean getDoctorBean() {
        return doctorBean;
    }

    public void setDoctorBean(DoctorBean doctorBean) {
        this.doctorBean = doctorBean;
    }

    public PatientBean getPatientBean() {
        return patientBean;
    }

    public void setPatientBean(PatientBean patientBean) {
        this.patientBean = patientBean;
    }

    public void displayAppointmentBean(String userId){
        ArrayList<AppointmentBean> appointmentBeanArrayList = Patient.getAppointmentBean(userId);
        System.out.println("app Id , DoctorID , DoctorName , app Date , app Time , apoointmnet Date");
        System.out.println("----------------------------------------------------------------------------" +
                "------");
        for(AppointmentBean appointmentBean : appointmentBeanArrayList){
            System.out.println(appointmentBean.getAppointmentId()+" , "+
                    appointmentBean.doctorBean.getDoctorId()+" , "+
                    appointmentBean.doctorBean.getDoctorName()+" , "+
                    appointmentBean.getAppointmentDate()+" , "+
                    appointmentBean.getAppointmentTime()+" , "+
                    appointmentBean.patientBean.getAppointmentDate());
        }
        System.out.println("----------------------------------------------------------------------------" +
                "------");
    }
    public int getId(String userId){
        ArrayList<AppointmentBean> appointmentBeanArrayList = Patient.getAppointmentBean(userId);
        return appointmentBeanArrayList.get(0).patientBean.getPatientId();
    }
}
