package com.example.restitusipln;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
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

import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {

    private EditText nip, name, tgl_lahir, alamat, email, password, c_password;
    private Button btnRegister;
    private ProgressBar loading;
    private static String URL_REGIST = Server.URL + "Register.php";
    DatePickerDialog datePicker;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        loading = findViewById(R.id.loading);
        nip = findViewById(R.id.nip);
        name = findViewById(R.id.name);
        tgl_lahir = findViewById(R.id.tgl_lahir);
        alamat = findViewById(R.id.alamat);
        email = findViewById(R.id.email);
        password = findViewById(R.id.password);
        c_password = findViewById(R.id.c_password);
        btnRegister = findViewById(R.id.btnRegister);

        tgl_lahir.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final Calendar c = Calendar.getInstance();
                int mTahun = c.get(Calendar.YEAR); // tahun sekarang
                int mBulan = c.get(Calendar.MONTH); // bulan sekarang
                int mHari = c.get(Calendar.DAY_OF_MONTH); // hari sekarang

                datePicker = new DatePickerDialog(RegisterActivity.this,
                        new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int tahun, int bulan, int hari) {
                        tgl_lahir.setText(tahun + "-"
                                + (bulan + 1) + "-" + hari);
                    }
                }, mTahun, mBulan, mHari);
                datePicker.show();
            }
        });

        btnRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String mNip         = nip.getText().toString().trim();
                String mNama        = name.getText().toString().trim();
                String mTgl_lahir   = tgl_lahir.getText().toString().trim();
                String mAlamat      = alamat.getText().toString().trim();
                String mEmail       = email.getText().toString().trim();
                String mPass        = password.getText().toString().trim();
                String mC_Pass      = c_password.getText().toString().trim();

                if (!mNama.isEmpty() && !mEmail.isEmpty() && !mPass.isEmpty() && !mC_Pass.isEmpty() && !mAlamat.isEmpty() && !mNip.isEmpty()  && !mTgl_lahir.isEmpty())
                {
                    Regist();
                }

                if (mNama.isEmpty())
                {
                    name.setError("Tidak Boleh Kosong");
                    /*email.setError("Masukkan Email");
                    password.setError("Masukkan Password");
                    c_password.setError("Masukkan Ulang Password");*/
                }

                if (mEmail.isEmpty())
                {
                    email.setError("Tidak Boleh Kosong");
                }

                if (mPass.isEmpty())
                {
                    password.setError("Tidak Boleh Kosong");
                }

                if (mC_Pass.isEmpty())
                {
                    c_password.setError("Tidak Boleh Kosong");
                }

                if (mNama.isEmpty() && mEmail.isEmpty() && mPass.isEmpty() && mC_Pass.isEmpty())
                {
                    name.setError("Tidak Boleh Kosong");
                    email.setError("Masukkan Email");
                    password.setError("Masukkan Password");
                    c_password.setError("Masukkan Ulang Password");
                }
            }
        });
    }

    private void Regist(){
        loading.setVisibility(View.VISIBLE);
        btnRegister.setVisibility(View.GONE);

        final String nip = this.nip.getText().toString().trim();
        final String name = this.name.getText().toString().trim();
        final String tgl_lahir = this.tgl_lahir.getText().toString().trim();
        final String alamat = this.alamat.getText().toString().trim();
        final String email = this.email.getText().toString().trim();
        final String password = this.password.getText().toString().trim();


        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_REGIST,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")){
                                Toast.makeText(RegisterActivity.this,
                                        "Register Success!", Toast.LENGTH_LONG)
                                        .show();
                                loading.setVisibility(View.GONE);

                                Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
                                startActivity(intent);

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(RegisterActivity.this,
                                    "Register Error! "+e.toString(), Toast.LENGTH_LONG)
                                    .show();

                            loading.setVisibility(View.GONE);
                            btnRegister.setVisibility(View.VISIBLE);
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(RegisterActivity.this,
                                "Register Error! "+error.toString(), Toast.LENGTH_LONG)
                                .show();
                        loading.setVisibility(View.GONE);
                        btnRegister.setVisibility(View.VISIBLE);
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("nip", nip);
                params.put("name", name);
                params.put("tgl_lahir", tgl_lahir);
                params.put("alamat", alamat);
                params.put("email", email);
                params.put("password", password);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }
}
