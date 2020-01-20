package com.example.restitusipln;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
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

import de.hdodenhof.circleimageview.CircleImageView;



public class HomeActivity extends AppCompatActivity {

    private static final String TAG = HomeActivity.class.getSimpleName(); //get info
    private TextView name;
    private Button btn_logout,btn_pengaturan, btn_pengajuan, btn_status;
    SessionManager sessionManager;
    String getId;
    CircleImageView circleImageView;
    private static String URL_LOGIN = Server.URL + "Login.php";
    private static String URL_HOME_FOTO = Server.URL + "home_foto.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        sessionManager = new SessionManager(this);
        sessionManager.checkLogin();

        name = findViewById(R.id.tv_name);
        btn_logout = findViewById(R.id.btn_logout);
        btn_pengajuan = findViewById(R.id.btn_pengajuan);
        btn_status = findViewById(R.id.btn_statusrestitusi);
        btn_pengaturan = findViewById(R.id.btn_pengaturan);
        circleImageView = findViewById(R.id.foto_profil);

        /*int gmbr = getResources().getIdentifier(getDrawable())*/

        /*String mName = user.get(sessionManager.NAME);
        String mEmail = user.get(sessionManager.EMAIL);*/

        /*name.setText(mName);*/

        HashMap<String, String> user = sessionManager.getUserDetail();
        getId = user.get(sessionManager.ID);

        Intent intent = getIntent();
        String extraName = intent.getStringExtra("name");

        name.setText(extraName);

        circleImageView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, EditActivity.class);
                startActivity(intent);
            }
        });

        btn_pengajuan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, PengajuanActivity.class);
                startActivity(intent);
            }
        });

        btn_status.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, StatusActivity.class);
                startActivity(intent);
            }
        });

        btn_pengaturan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HomeActivity.this, EditActivity.class);
                startActivity(intent);

                //Login(sessionManager);
            }
        });

        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionManager.Logout();
            }
        });


    }

    //get user foto
    private void getUserFoto(){

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_HOME_FOTO,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG, response.toString());

                        try
                        {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("read");

                            if (success.equals("1"))
                            {
                                for (int i = 0; i<jsonArray.length(); i++)
                                {
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    String strName = object.getString("name").trim();
                                   /* String strEmail = object.getString("email").trim();*/
                                    String strImage = object.getString("image").trim();

                                    name.setText(strName);
                                    /*email.setText(strEmail);*/


                                    if (!strImage.isEmpty())
                                    {
                                        Picasso.get().load(strImage).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(circleImageView);
                                    }



                                }
                            }
                        }
                        catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(HomeActivity.this,
                                    "Error Reading Detail "+e.toString(), Toast.LENGTH_SHORT)
                                    .show();
                        }


                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(HomeActivity.this,
                                "Error Reading Detai; "+error.toString(), Toast.LENGTH_SHORT)
                                .show();
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

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    @Override
    protected void onResume() {
        super.onResume();
        getUserFoto();
    }


}
