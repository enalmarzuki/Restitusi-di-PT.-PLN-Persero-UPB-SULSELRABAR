package com.example.restitusipln;

public class ListPengajuan {

    private String no_restitusi;
    private String tgl_post;
    private String status_restitusi;

    public ListPengajuan (String no_restitusi, String tgl_post, String status_restitusi){

        this.no_restitusi = no_restitusi;
        this.tgl_post = tgl_post;
        this.status_restitusi = status_restitusi;

    }

    public String getNo_restitusi() {
        return no_restitusi;
    }

    public String getTgl_post() {
        return tgl_post;
    }

    public String getStatus_restitusi() {
        return status_restitusi;
    }
}
