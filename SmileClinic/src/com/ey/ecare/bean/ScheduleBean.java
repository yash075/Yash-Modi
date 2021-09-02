package com.ey.ecare.bean;

import com.ey.ecare.dao.*;

import java.util.ArrayList;

public class ScheduleBean {
    private int scheduleId;
    private int doctorId;
    private DoctorBean doctorBeans;
    private String availableDays;
    private String slots;

    public ScheduleBean() {
    }
    public ScheduleBean(int scheduleId, int doctorId, String availableDays, String slots) {
        this.scheduleId = scheduleId;
        this.doctorId = doctorId;
        this.availableDays = availableDays;
        this.slots = slots;
    }

    public ScheduleBean(int scheduleId, int doctorId, DoctorBean doctorBeans, String availableDays, String slots) {
        this.scheduleId = scheduleId;
        this.doctorId = doctorId;
        this.doctorBeans = doctorBeans;
        this.availableDays = availableDays;
        this.slots = slots;
    }

    public DoctorBean getDoctorBeans() {
        return doctorBeans;
    }

    public void setDoctorBeans(DoctorBean doctorBeans) {
        this.doctorBeans = doctorBeans;
    }

    public int getScheduleId() {
        return scheduleId;
    }

    public void setScheduleId(int scheduleId) {
        this.scheduleId = scheduleId;
    }

    public int getDoctorId() {
        return doctorId;
    }

    public void setDoctorId(int doctorId) {
        this.doctorId = doctorId;
    }

    public String getAvailableDays() {
        return availableDays;
    }

    public void setAvailableDays(String availableDays) {
        this.availableDays = availableDays;
    }

    public String getSlots() {
        return slots;
    }

    public void setSlots(String slots) {
        this.slots = slots;
    }


    public void displayScheduleBean(){
        ArrayList<ScheduleBean> scheduleBeanArrayList = Patient.getScheduleBean();
        System.out.println("DoctorId , DoctorName , Specialization , Available Day , Slot");
        System.out.println("----------------------------------------------------------------------------" +
                "------");
        for(ScheduleBean scheduleBean : scheduleBeanArrayList){
            System.out.println(scheduleBean.getDoctorId()+" , "+
                    scheduleBean.doctorBeans.getDoctorName()+" , "+scheduleBean.doctorBeans.getSpecialization()+" , "+
                    scheduleBean.getAvailableDays()+" , "+scheduleBean.getSlots());
        }
        System.out.println("----------------------------------------------------------------------------" +
                "------");
    }
}
