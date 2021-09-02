package com.ey.ecare.bean;

import com.ey.ecare.dao.*;

import java.util.ArrayList;
import java.util.Date;

public class LeaveBean {
    private int leaveId;
    private int doctorId;
    private DoctorBean doctorBean;
    private Date leaveFrom;
    private Date leaveTo;
    private String reason;
    private int status;

    public LeaveBean() {
    }

    public LeaveBean(int leaveId, int doctorId, DoctorBean doctorBean, Date leaveFrom, Date leaveTo, String reason, int status) {
        this.leaveId = leaveId;
        this.doctorId = doctorId;
        this.doctorBean = doctorBean;
        this.leaveFrom = leaveFrom;
        this.leaveTo = leaveTo;
        this.reason = reason;
        this.status = status;
    }

    public LeaveBean(int leaveId, int doctorId, Date leaveFrom, Date leaveTo, String reason, int status) {
        this.leaveId = leaveId;
        this.doctorId = doctorId;
        this.leaveFrom = leaveFrom;
        this.leaveTo = leaveTo;
        this.reason = reason;
        this.status = status;
    }

    public int getLeaveId() {
        return leaveId;
    }

    public void setLeaveId(int leaveId) {
        this.leaveId = leaveId;
    }

    public int getDoctorId() {
        return doctorId;
    }

    public void setDoctorId(int doctorId) {
        this.doctorId = doctorId;
    }

    public DoctorBean getDoctorBean() {
        return doctorBean;
    }

    public void setDoctorBean(DoctorBean doctorBean) {
        this.doctorBean = doctorBean;
    }

    public Date getLeaveFrom() {
        return leaveFrom;
    }

    public void setLeaveFrom(Date leaveFrom) {
        this.leaveFrom = leaveFrom;
    }

    public Date getLeaveTo() {
        return leaveTo;
    }

    public void setLeaveTo(Date leaveTo) {
        this.leaveTo = leaveTo;
    }

    public String getReason() {
        return reason;
    }

    public void setReason(String reason) {
        this.reason = reason;
    }

    public int getStatus() {
        return status;
    }

    public void setStatus(int status) {
        this.status = status;
    }
    public void displayLeaveBean(){
        ArrayList<LeaveBean> leaveBeanArrayList = Reporter.getLeaveBean();
        System.out.println("DoctorId , DoctorName , Specialization , Leave From , Leave To , Reason , Status");
        System.out.println("----------------------------------------------------------------------------" +
                "------");
        for(LeaveBean leaveBean : leaveBeanArrayList){
            System.out.println(leaveBean.doctorBean.getDoctorId()+" , "+
                    leaveBean.doctorBean.getDoctorName()+" , "+leaveBean.doctorBean.getSpecialization()+" , "+
                    leaveBean.getLeaveFrom()+" , "+leaveBean.getLeaveTo()+" , "+leaveBean.getReason()+
                    " , "+leaveBean.getStatus());
        }
        System.out.println("----------------------------------------------------------------------------" +
                "------");
    }
}