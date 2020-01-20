package com.example.restitusipln;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.text.Layout;
import android.util.Log;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DeatilActivity extends AppCompatActivity {

    private static final String URL_DETAIL = Server.URL + "detail_restitusi.php";

    private static final String TAG = "DeatilActivity";

    ImageView imgV_SPPD,imgV_tiket_pesawat, imgV_Kwitansi_tiket, imgV_Boarding_pass, imgV_penginapan, imgV_sppd_manual;
    EditText nomor_restitusi;
    TextView tv_komentar;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);
        Log.d(TAG, "onCreate: started");

        imgV_SPPD           = findViewById(R.id.imgV_sppd);
        imgV_tiket_pesawat  = findViewById(R.id.imgV_tiket_pesawat);
        imgV_Kwitansi_tiket = findViewById(R.id.imgV_kwitansi_pesawat);
        imgV_Boarding_pass  = findViewById(R.id.imgV_boarding_pass);
        imgV_penginapan     = findViewById(R.id.imgV_kwitansi_penginapan);
        imgV_sppd_manual    = findViewById(R.id.imgV_sppd_manual);
        tv_komentar         = findViewById(R.id.tv_komentar);

        getIncomingIntent();
    }

    private void getIncomingIntent(){
        Log.d(TAG, "getIncomingIntent: checking for incoming intent");
        if (getIntent().hasExtra("no_restitusi"))
        {
            Log.d(TAG, "getIncomingIntent: found intent extra");

            String no_restitusi = getIntent().getStringExtra("no_restitusi");

            setImage(no_restitusi);
        }
    }

    private void setImage(String no_restitusi){
        nomor_restitusi = findViewById(R.id.edt_no_restitusi);
        nomor_restitusi.setText(no_restitusi);

        getUserFoto(no_restitusi);
    }

    private void getUserFoto(final String nomor_res){

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_DETAIL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG, response.toString());

                        try
                        {
                            JSONObject jsonObject   = new JSONObject(response);
                            String success          = jsonObject.getString("success");
                            JSONArray jsonArray     = jsonObject.getJSONArray("read");

                            if (success.equals("1"))
                            {
                                for (int i = 0; i<jsonArray.length(); i++)
                                {
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    //String strName = object.getString("name").trim();
                                    /* String strEmail = object.getString("email").trim();*/

                                    String strFormulir_sppd         = object.getString("foto_formulir_sppd").trim();
                                    String strTiket_pesawat         = object.getString("foto_tiket_pesawat").trim();
                                    String strKwitansi_tiket        = object.getString("foto_kwitansi_tiket").trim();
                                    String strBoarding_pass         = object.getString("foto_boarding_pass").trim();
                                    String strKwitansi_penginapan   = object.getString("foto_kwitansi_penginapan").trim();
                                    String strSPPD_manual           = object.getString("foto_sppd_manual").trim();
                                    String strKomen                 = object.getString("komentar").trim();

                                    tv_komentar.setText(strKomen);

                                    //name.setText(strName);
                                    /*email.setText(strEmail);*/


                                    if (!strFormulir_sppd.isEmpty())
                                    {
                                        Picasso.get().load(strFormulir_sppd).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(imgV_SPPD);

                                        Picasso.get().load(strTiket_pesawat).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(imgV_tiket_pesawat);

                                        Picasso.get().load(strKwitansi_tiket).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(imgV_Kwitansi_tiket);

                                        Picasso.get().load(strBoarding_pass).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(imgV_Boarding_pass);

                                        Picasso.get().load(strKwitansi_penginapan).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(imgV_penginapan);

                                        Picasso.get().load(strSPPD_manual).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(imgV_sppd_manual);
                                    }



                                }
                            }
                        }
                        catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(DeatilActivity.this,
                                    "Error Reading Detail "+e.toString(), Toast.LENGTH_SHORT)
                                    .show();
                        }


                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(DeatilActivity.this,
                                "Error Reading Detai; "+error.toString(), Toast.LENGTH_SHORT)
                                .show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("no_restitusi", nomor_res);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
