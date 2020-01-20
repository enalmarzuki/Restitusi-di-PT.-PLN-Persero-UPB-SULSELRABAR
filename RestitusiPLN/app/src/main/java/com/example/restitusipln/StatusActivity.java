package com.example.restitusipln;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class StatusActivity extends AppCompatActivity {

    SessionManager sessionManager;
    String getId;

    List<ListPengajuan> listPengajuan;
    RecyclerView recyclerView;

    private static final String URL_STATUS = Server.URL + "status_restitusi.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_status);

        sessionManager = new SessionManager(this);
        /*sessionManager.checkLogin();*/

        recyclerView = findViewById(R.id.recylerView);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        HashMap<String, String> user = sessionManager.getUserDetail();
        getId = user.get(sessionManager.ID);

        listPengajuan = new ArrayList<>();

        loadStatus();
    }

    private void loadStatus() {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_STATUS,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try
                        {

                            JSONArray array = new JSONArray(response);

                            for (int i = 0; i < array.length(); i++)
                            {
                                JSONObject product = array.getJSONObject(i);

                                listPengajuan.add(new ListPengajuan(
                                        product.getString("no_restitusi"),
                                        product.getString("tgl_post"),
                                        product.getString("status")

                                ));
                            }

                            ListPengajuanAdapter adapter = new ListPengajuanAdapter(StatusActivity.this, listPengajuan);
                            recyclerView.setAdapter(adapter);
                        }
                        catch (JSONException e)
                        {
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
                params.put("id", getId);
                return params;
            }
        };
        Volley.newRequestQueue(this).add(stringRequest);
        /*RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);*/
    }
}

