package com.example.restitusipln;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.provider.MediaStore;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Base64;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

public class PengajuanActivity extends AppCompatActivity implements View.OnClickListener {

    private String URL_UPLOAD =  Server.URL + "upload_restitusi.php";

    private Button  btn_Upload_Formulir_Sppd,
                    btn_Upload_Formulir_Sppd1,
                    btn_Upload_Tiket_Pesawat,
                    btn_Upload_Kwitansi_Tiket,
                    btn_Upload_Boarding_Pass,
                    btn_Upload_Kwitansi_Penginapan,
                    btn_Upload_Sppd_Manual,
                    btn_Upload_Restitusi;

    ImageView   imgV_Sppd,
                imgV_tiket_pesawat,
                imgV_kwitansi_pesawat,
                imgV_boarding_pass,
                imgV_kwitansi_penginapan,
                imgV_sppd_manual, img_home;

    EditText edt_sessID,
             edt_no_restitusi,
             edt_Darimana,
             edt_Kemana,
             edt_Agenda,
             edt_Berangkat,
             edt_Pulang,
             edt_brpHari,
             edt_Biaya_transpor,
             edt_Biaya_Penginapan;

    EditText edt_jml;

    SessionManager sessionManager;
    String getId;

    private final int   IMG_REQUEST   = 1,
                        IMG_REQUEST1  = 11,
                        IMG_REQUEST_2 = 2,
                        IMG_REQUEST_3 = 3,
                        IMG_REQUEST_4 = 4,
                        IMG_REQUEST_5 = 5,
                        IMG_REQUEST_6 = 6;

    private Bitmap  bitmap,
                    bitmap2,
                    bitmap3,
                    bitmap4,
                    bitmap5,
                    bitmap6;

    ProgressBar progressBar;
    DatePickerDialog datePicker, datePickerDialog;
    Calendar calendar;

    int tranpor, penginapan, jml;
    String Stranportasi, Spenginapan, Sjml;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pengajuan);

        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();

        edt_Darimana = findViewById(R.id.edt_darimana);
        edt_Kemana = findViewById(R.id.edt_kemana);
        edt_Agenda = findViewById(R.id.edt_agenda);
        edt_Berangkat = findViewById(R.id.edt_berangkat);
        edt_Pulang = findViewById(R.id.edt_pulang);
        edt_brpHari = findViewById(R.id.edt_lama_sppd);
        edt_Biaya_transpor = findViewById(R.id.edt_biaya_transpor);
        edt_Biaya_Penginapan = findViewById(R.id.edt_biaya_penginapan);
        edt_jml = findViewById(R.id.edt_jumlah);

        //edt_Biaya_transpor.addTextChangedListener(onTextChangedListenerTranspor());

       /* btn_Upload_Formulir_Sppd        = findViewById(R.id.btn_upload_formulir_sppd);*/
        btn_Upload_Formulir_Sppd1        = findViewById(R.id.btn_upload_formulir_sppd1);
        btn_Upload_Tiket_Pesawat        = findViewById(R.id.btn_upload_tiket_pesawat);
        btn_Upload_Kwitansi_Tiket       = findViewById(R.id.btn_upload_kwitansi_tiket);
        btn_Upload_Boarding_Pass        = findViewById(R.id.btn_upload_boarding_pass);
        btn_Upload_Kwitansi_Penginapan  = findViewById(R.id.btn_upload_kwitansi_penginapan);
        btn_Upload_Sppd_Manual          = findViewById(R.id.btn_upload_sppd_manual);
        btn_Upload_Restitusi            = findViewById(R.id.btn_upload_restitusi);

        imgV_Sppd                   = findViewById(R.id.imgV_sppd);
        imgV_tiket_pesawat          = findViewById(R.id.imgV_tiket_pesawat);
        imgV_kwitansi_pesawat       = findViewById(R.id.imgV_kwitansi_pesawat);
        imgV_boarding_pass          = findViewById(R.id.imgV_boarding_pass);
        imgV_kwitansi_penginapan    = findViewById(R.id.imgV_kwitansi_penginapan);
        imgV_sppd_manual            = findViewById(R.id.imgV_sppd_manual);

        HashMap<String, String> user = sessionManager.getUserDetail();
        getId = user.get(sessionManager.ID);

        edt_sessID = findViewById(R.id.sessionID);
        edt_sessID.setText(getId);

        edt_no_restitusi = findViewById(R.id.edt_no_restitusi);

       /* btn_Upload_Formulir_Sppd.setOnClickListener(this);*/
        btn_Upload_Formulir_Sppd1.setOnClickListener(this);
        btn_Upload_Tiket_Pesawat.setOnClickListener(this);
        btn_Upload_Kwitansi_Tiket.setOnClickListener(this);
        btn_Upload_Boarding_Pass.setOnClickListener(this);
        btn_Upload_Kwitansi_Penginapan.setOnClickListener(this);
        btn_Upload_Sppd_Manual.setOnClickListener(this);
        btn_Upload_Restitusi.setOnClickListener(this);

        edt_Berangkat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final Calendar c = Calendar.getInstance();
                int mTahun = c.get(Calendar.YEAR); // tahun sekarang
                int mBulan = c.get(Calendar.MONTH); // bulan sekarang
                int mHari = c.get(Calendar.DAY_OF_MONTH); // hari sekarang

                datePicker = new DatePickerDialog(PengajuanActivity.this,
                        new DatePickerDialog.OnDateSetListener() {
                            @Override
                            public void onDateSet(DatePicker view, int tahun, int bulan, int hari) {
                                edt_Berangkat.setText(tahun + "-"
                                        + (bulan + 1) + "-" + hari);
                            }
                        }, mTahun, mBulan, mHari);
                datePicker.show();
            }
        });

        edt_Pulang.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final Calendar c = Calendar.getInstance();
                int mTahun2 = c.get(Calendar.YEAR); // tahun sekarang
                int mBulan2 = c.get(Calendar.MONTH); // bulan sekarang
                int mHari2 = c.get(Calendar.DAY_OF_MONTH); // hari sekarang

                datePickerDialog = new DatePickerDialog(PengajuanActivity.this,
                        new DatePickerDialog.OnDateSetListener() {
                            @Override
                            public void onDateSet(DatePicker view, int tahun, int bulan, int hari) {
                                edt_Pulang.setText(tahun + "-"
                                        + (bulan + 1) + "-" + hari);
                            }
                        }, mTahun2, mBulan2, mHari2);
                datePickerDialog.show();
            }
        });

        /*Spenginapan = edt_Biaya_Penginapan.getText().toString();
        Stranportasi = edt_Biaya_transpor.getText().toString();

        tranpor = Integer.parseInt(Stranportasi);
        penginapan = Integer.parseInt(Spenginapan);

        tranpor = Integer.parseInt(edt_Biaya_transpor.getText().toString());
        penginapan = Integer.parseInt(edt_Biaya_Penginapan.getText().toString());

        jml = tranpor + penginapan;
        Sjml = String.valueOf(jml);
        edt_jml.setText(Sjml);*/


        edt_Biaya_Penginapan.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                edt_Biaya_Penginapan.removeTextChangedListener(this);
                String originalString = s.toString();
                try {


                    Long longval;
                    if (originalString.contains(",")) {
                        originalString = originalString.replaceAll(",", "");
                    }
                    longval = Long.parseLong(originalString);

                    DecimalFormat formatter = (DecimalFormat) NumberFormat.getInstance(Locale.US);
                    formatter.applyPattern("#,###,###,###");
                    String formattedString = formatter.format(longval);

                    //setting text after format to EditText
                    edt_Biaya_Penginapan.setText(formattedString);
                    edt_Biaya_Penginapan.setSelection(edt_Biaya_Penginapan.getText().length());
                } catch (NumberFormatException nfe) {
                    nfe.printStackTrace();
                }

                edt_Biaya_Penginapan.addTextChangedListener(this);
                DecimalFormat formatter1 = (DecimalFormat) NumberFormat.getInstance(Locale.US);
                formatter1.applyPattern("#,###,###,###");
                Long longSjml;
                if (originalString.toString().length() >0) {
                    //String mTransportasi = edt_Biaya_transpor.getText().toString().trim();
                    penginapan = Integer.parseInt(originalString);
                    jml = penginapan + tranpor;
                    Sjml = String.valueOf(jml);
                    longSjml  = Long.parseLong(Sjml);
                    String formattedString1 = formatter1.format(longSjml);
                    edt_jml.setText(formattedString1);

                }else {
                    /*edt_Biaya_transpor.setText("0");
                    edt_jml.setText("0");*/
                    penginapan = 0;
                    jml = 0;
                    Sjml = String.valueOf(jml);
                    edt_jml.setText(Sjml);
                }
            }

            @Override
            public void afterTextChanged(Editable s) {

            }
        });

        edt_Biaya_transpor.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {

            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                edt_Biaya_transpor.removeTextChangedListener(this);
                String originalString = s.toString();
                try {


                    Long longval;
                    if (originalString.contains(",")) {
                        originalString = originalString.replaceAll(",", "");
                    }
                    longval = Long.parseLong(originalString);

                    DecimalFormat formatter = (DecimalFormat) NumberFormat.getInstance(Locale.US);
                    formatter.applyPattern("#,###,###,###");
                    String formattedString = formatter.format(longval);

                    //setting text after format to EditText
                    edt_Biaya_transpor.setText(formattedString);
                    edt_Biaya_transpor.setSelection(edt_Biaya_transpor.getText().length());
                } catch (NumberFormatException nfe) {
                    nfe.printStackTrace();
                }

                edt_Biaya_transpor.addTextChangedListener(this);
                DecimalFormat formatter1 = (DecimalFormat) NumberFormat.getInstance(Locale.US);
                formatter1.applyPattern("#,###,###,###");
                Long longSjml;
                if (originalString.toString().length() >0) {
                    //String mTransportasi = edt_Biaya_transpor.getText().toString().trim();
                    tranpor = Integer.parseInt(originalString);
                    jml = penginapan + tranpor;
                    Sjml = String.valueOf(jml);
                    longSjml  = Long.parseLong(Sjml);
                    String formattedString1 = formatter1.format(longSjml);
                    edt_jml.setText(formattedString1);
                }else {
                    /*edt_Biaya_transpor.setText("0");
                    edt_jml.setText("0");*/
                    tranpor = 0;
                    jml = 0;
                    Sjml = String.valueOf(jml);
                    edt_jml.setText(Sjml);
                }
            }

            @Override
            public void afterTextChanged(Editable s) {

            }
        });

    }


    @Override
    public void onClick(View v) {
        switch (v.getId())
        {
           /* case R.id.btn_upload_formulir_sppd :
                *//*selectImage();*//*
                break;*/

            case R.id.btn_upload_formulir_sppd1 :
                selectImage_1();
                break;

            case R.id.btn_upload_tiket_pesawat :
                selectImage2();
                break;

            case R.id.btn_upload_kwitansi_tiket :
                selectImage3();
                break;

            case R.id.btn_upload_boarding_pass :
                selectImage4();
                break;

            case R.id.btn_upload_kwitansi_penginapan :
                selectImage5();
                break;

            case R.id.btn_upload_sppd_manual :
                selectImage6();
                break;

            case R.id.btn_upload_restitusi :
                uploadImage();
                break;
        }
    }

    /*private void selectImage(){

        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST);

    }*/

    private void selectImage_1(){

        Intent intent = new Intent();
        //intent.setType("image/*");
        intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, IMG_REQUEST1);

    }

    private void selectImage2(){

        /*Intent intent = new Intent();
        *//*intent.setType("image/*");*//*
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST_2);*/

        Intent intent = new Intent();
        //intent.setType("image/*");
        intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, IMG_REQUEST_2);

    }

    private void selectImage3(){

        /*Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST_3);*/

        Intent intent = new Intent();
        //intent.setType("image/*");
        intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, IMG_REQUEST_3);

    }

    private void selectImage4(){

       /* Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST_4);*/

        Intent intent = new Intent();
        //intent.setType("image/*");
        intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, IMG_REQUEST_4);

    }

    private void selectImage5(){

       /* Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST_5);*/

        Intent intent = new Intent();
        //intent.setType("image/*");
        intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, IMG_REQUEST_5);

    }

    private void selectImage6(){

       /* Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(intent, IMG_REQUEST_6);*/

        Intent intent = new Intent();
        //intent.setType("image/*");
        intent.setAction(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, IMG_REQUEST_6);

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {

        super.onActivityResult(requestCode, resultCode, data);

        /*if (requestCode == IMG_REQUEST && resultCode == RESULT_OK && data != null)
        {
            Uri path =  data.getData();

            try {

                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), path);
                imgV_Sppd.setImageBitmap(bitmap);
                imgV_Sppd.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }

        }*/

        if (requestCode == IMG_REQUEST1 && resultCode == RESULT_OK && data != null)
        {
//            Uri path =  data.getData();
//
//            try {
//                bitmap = (Bitmap) data.getExtras().get("data");
//                imgV_Sppd.setImageBitmap(bitmap);
//                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), path);
//                imgV_Sppd.setImageBitmap(bitmap);
//                imgV_Sppd.setVisibility(View.VISIBLE);
//
//            } catch (IOException e) {
//                e.printStackTrace();
//            }
            bitmap = (Bitmap) data.getExtras().get("data");
            imgV_Sppd.setImageBitmap(bitmap);
            imgV_Sppd.setVisibility(View.VISIBLE);

        }

        if (requestCode == IMG_REQUEST_2 && resultCode == RESULT_OK && data != null)
        {
//            Uri path2 = data.getData();
//            try {
//
//                bitmap2 = MediaStore.Images.Media.getBitmap(getContentResolver(), path2);
//                imgV_tiket_pesawat.setImageBitmap(bitmap2);
//                imgV_tiket_pesawat.setVisibility(View.VISIBLE);
//
//            } catch (IOException e) {
//                e.printStackTrace();
//            }

            bitmap2 = (Bitmap) data.getExtras().get("data");
            imgV_tiket_pesawat.setImageBitmap(bitmap2);
            imgV_tiket_pesawat.setVisibility(View.VISIBLE);

        }

        if (requestCode == IMG_REQUEST_3 && resultCode == RESULT_OK && data != null)
        {
            /*Uri path3 = data.getData();
            try {

                bitmap3 = MediaStore.Images.Media.getBitmap(getContentResolver(), path3);
                imgV_kwitansi_pesawat.setImageBitmap(bitmap3);
                imgV_kwitansi_pesawat.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }*/

            bitmap3 = (Bitmap) data.getExtras().get("data");
            imgV_kwitansi_pesawat.setImageBitmap(bitmap3);
            imgV_kwitansi_pesawat.setVisibility(View.VISIBLE);

        }

        if (requestCode == IMG_REQUEST_4 && resultCode == RESULT_OK && data != null)
        {
            /*Uri path4 = data.getData();
            try {

                bitmap4 = MediaStore.Images.Media.getBitmap(getContentResolver(), path4);
                imgV_boarding_pass.setImageBitmap(bitmap4);
                imgV_boarding_pass.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }*/

            bitmap4 = (Bitmap) data.getExtras().get("data");
            imgV_boarding_pass.setImageBitmap(bitmap4);
            imgV_boarding_pass.setVisibility(View.VISIBLE);

        }

        if (requestCode == IMG_REQUEST_5 && resultCode == RESULT_OK && data != null)
        {
            /*Uri path5 = data.getData();
            try {

                bitmap5 = MediaStore.Images.Media.getBitmap(getContentResolver(), path5);
                imgV_kwitansi_penginapan.setImageBitmap(bitmap5);
                imgV_kwitansi_penginapan.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }*/

            bitmap5 = (Bitmap) data.getExtras().get("data");
            imgV_kwitansi_penginapan.setImageBitmap(bitmap5);
            imgV_kwitansi_penginapan.setVisibility(View.VISIBLE);

        }

        if (requestCode == IMG_REQUEST_6 && resultCode == RESULT_OK && data != null)
        {
            /*Uri path6 = data.getData();
            try {

                bitmap6 = MediaStore.Images.Media.getBitmap(getContentResolver(), path6);
                imgV_sppd_manual.setImageBitmap(bitmap6);
                imgV_sppd_manual.setVisibility(View.VISIBLE);

            } catch (IOException e) {
                e.printStackTrace();
            }*/

            bitmap6 = (Bitmap) data.getExtras().get("data");
            imgV_sppd_manual.setImageBitmap(bitmap6);
            imgV_sppd_manual.setVisibility(View.VISIBLE);

        }
    }

    private void uploadImage(){

        final String no_restitusi = this.edt_no_restitusi.getText().toString().trim();
        final String darimana = this.edt_Darimana.getText().toString().trim();
        final String kemana = this.edt_Kemana.getText().toString().trim();
        final String agenda = this.edt_Agenda.getText().toString().trim();
        final String tgl_pergi = this.edt_Berangkat.getText().toString().trim();
        final String tgl_pulang = this.edt_Pulang.getText().toString().trim();
        final String lama_sppd = this.edt_brpHari.getText().toString().trim();
        final String biaya_transpor = this.edt_Biaya_transpor.getText().toString().trim().replaceAll(",", "");
        final String biaya_penginapan = this.edt_Biaya_Penginapan.getText().toString().trim().replaceAll(",", "");
        final String jumlah = this.edt_jml.getText().toString().trim().replaceAll(",", "");



        final String id_user = this.edt_sessID.getText().toString().trim();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_UPLOAD,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1"))
                            {
                                Toast.makeText(PengajuanActivity.this,
                                        "Success !", Toast.LENGTH_SHORT)
                                        .show();
                            }

                            Intent intent = new Intent(PengajuanActivity.this, HomeActivity.class);
                            startActivity(intent);

                           /* Toast.makeText(PengajuanActivity.this,
                                    Response, Toast.LENGTH_LONG)
                                    .show();*/

                            Toast.makeText(PengajuanActivity.this,
                                    "Pengajuan Berhasil", Toast.LENGTH_SHORT)
                                    .show();


                            imgV_Sppd.setImageResource(0);
                            imgV_Sppd.setVisibility(View.GONE);

                            imgV_tiket_pesawat.setImageResource(0);
                            imgV_tiket_pesawat.setVisibility(View.GONE);

                            imgV_kwitansi_pesawat.setImageResource(0);
                            imgV_kwitansi_pesawat.setVisibility(View.GONE);

                            imgV_boarding_pass.setImageResource(0);
                            imgV_boarding_pass.setVisibility(View.GONE);

                            imgV_kwitansi_penginapan.setImageResource(0);
                            imgV_kwitansi_penginapan.setVisibility(View.GONE);

                            imgV_sppd_manual.setImageResource(0);
                            imgV_sppd_manual.setVisibility(View.GONE);


                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_user", getId);
                params.put("no_restitusi", no_restitusi);
                params.put("darimana", darimana);
                params.put("kemana", kemana);
                params.put("agenda", agenda);
                params.put("tgl_pergi", tgl_pergi);
                params.put("tgl_pulang", tgl_pulang);
                params.put("lama_sppd", lama_sppd);
                params.put("biaya_transpor", biaya_transpor);
                params.put("biaya_penginapan", biaya_penginapan);
                params.put("jumlah", jumlah);
                params.put("image", imageToString(bitmap));
                params.put("image2", imageToString2(bitmap2));
                params.put("image3", imageToString3(bitmap3));
                params.put("image4", imageToString4(bitmap4));
                params.put("image5", imageToString5(bitmap5));
                params.put("image6", imageToString6(bitmap6));

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

        /*Toast.makeText(PengajuanActivity.this,
                "Pengajuan Berhasil", Toast.LENGTH_SHORT)
                .show();

        Intent intent = new Intent(PengajuanActivity.this, HomeActivity.class);
        startActivity(intent);*/

    }

    private String imageToString(Bitmap bitmap){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imgBytes = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imgBytes, Base64.DEFAULT);

    }

    private String imageToString2(Bitmap bitmap2){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap2.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imgBytes = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imgBytes, Base64.DEFAULT);

    }

    private String imageToString3(Bitmap bitmap3){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap3.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imgBytes = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imgBytes, Base64.DEFAULT);

    }

    private String imageToString4(Bitmap bitmap4){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap4.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imgBytes = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imgBytes, Base64.DEFAULT);

    }

    private String imageToString5(Bitmap bitmap5){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap5.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imgBytes = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imgBytes, Base64.DEFAULT);

    }

    private String imageToString6(Bitmap bitmap6){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap6.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
        byte[] imgBytes = byteArrayOutputStream.toByteArray();
        return Base64.encodeToString(imgBytes, Base64.DEFAULT);

    }
}
