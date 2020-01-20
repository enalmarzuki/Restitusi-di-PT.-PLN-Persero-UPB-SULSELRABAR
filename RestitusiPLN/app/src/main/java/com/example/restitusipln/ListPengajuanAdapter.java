package com.example.restitusipln;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class ListPengajuanAdapter extends RecyclerView.Adapter<ListPengajuanAdapter.StatusViewHolder> {

    private Context mCtx;
    private List<ListPengajuan> listPengajuan;
    private ArrayList<String> komentar = new ArrayList<>();
    private ArrayList<String> Image = new ArrayList<>();
    private ArrayList<String> no_restitusi = new ArrayList<>();

    public ListPengajuanAdapter(Context mCtx, List<ListPengajuan> listPengajuan){

        this.mCtx = mCtx;
        this.listPengajuan = listPengajuan;

        /*this.komentar = komentar;
        this.Image = Image;*/

    }


    @NonNull
    @Override
    public StatusViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.list_status_restitusi, null);
        return new StatusViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull final StatusViewHolder holder, final int position) {

        final ListPengajuan status = listPengajuan.get(position);

        holder.textViewNoRestitusi.setText(status.getNo_restitusi());
        holder.textViewTanggal.setText(status.getTgl_post());
        holder.textViewStatus.setText(status.getStatus_restitusi());

        holder.rellay2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(mCtx, DeatilActivity.class);
                intent.putExtra("no_restitusi", status.getNo_restitusi());
                mCtx.startActivity(intent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return listPengajuan.size();
    }

    class StatusViewHolder extends RecyclerView.ViewHolder{

        TextView textViewNoRestitusi, textViewTanggal,textViewStatus;
        RelativeLayout rellay2;

        public StatusViewHolder(@NonNull View itemView) {
            super(itemView);

            textViewNoRestitusi = itemView.findViewById(R.id.textViewNoRestitusi);
            textViewTanggal = itemView.findViewById(R.id.textViewTanggal);
            textViewStatus = itemView.findViewById(R.id.textViewStatus);
            rellay2 = itemView.findViewById(R.id.rellay2);
        }
    }
}
