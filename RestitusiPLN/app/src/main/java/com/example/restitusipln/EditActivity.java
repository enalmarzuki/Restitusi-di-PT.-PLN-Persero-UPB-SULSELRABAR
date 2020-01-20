package com.example.restitusipln;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.provider.MediaStore;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Base64;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
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

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class EditActivity extends AppCompatActivity {

    private static final String TAG = HomeActivity.class.getSimpleName(); //get info
    private TextView nip, name, email, tgl_lahir, alamat, password;
    Button btn_upload_foto;
    SessionManager sessionManager;
    String getId;
    private static String URL_READ = Server.URL + "read_detail.php";
    private static String URL_EDIT = Server.URL + "edit_detail.php";
    private static String URL_UPLOAD = Server.URL + "Upload.php";
    private Menu action;
    private Bitmap bitmap;
    CircleImageView profile_image;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit);

        sessionManager = new SessionManager(this);

        nip             = findViewById(R.id.edt_nip);
        name            = findViewById(R.id.edt_name_edit);
        email           = findViewById(R.id.edt_email);
        tgl_lahir       = findViewById(R.id.edt_tgl_lahir);
        alamat          = findViewById(R.id.edt_alamat);
        password        = findViewById(R.id.edt_password);
        btn_upload_foto = findViewById(R.id.btn_edit_foto);

        profile_image = findViewById(R.id.foto_profil_edit);

        HashMap<String, String> user = sessionManager.getUserDetail();
        getId = user.get(sessionManager.ID);

        btn_upload_foto.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                chooseFile();
            }
        });


    }

    //get user detail
    private void getUserDetail(){

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_READ,
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

                                    String strNip       = object.getString("nip").trim();
                                    String strName      = object.getString("name").trim();
                                    String strEmail     = object.getString("email").trim();
                                    String strTglLahir  = object.getString("tgl_lahir").trim();
                                    String strAlamat    = object.getString("alamat").trim();
                                    String strPassword  = object.getString("password").trim();
                                    String strImage     = object.getString("image").trim();

                                    nip.setText(strNip);
                                    name.setText(strName);
                                    email.setText(strEmail);
                                    tgl_lahir.setText(strTglLahir);
                                    alamat.setText(strAlamat);
                                    password.setText(strPassword);

                                    if (!strImage.isEmpty())
                                    {
                                        Picasso.get().load(strImage).memoryPolicy(MemoryPolicy.NO_CACHE)
                                                .networkPolicy(NetworkPolicy.NO_CACHE).into(profile_image);
                                    }
                                    /*Picasso.get().load(strImage).into(profile_image);*/

                                    /*Picasso.get().load(strImage).memoryPolicy(MemoryPolicy.NO_CACHE)
                                            .networkPolicy(NetworkPolicy.NO_CACHE).into(profile_image);*/

                                }
                            }
                        }
                        catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(EditActivity.this,
                                    "Error Reading Detail "+e.toString(), Toast.LENGTH_SHORT)
                                    .show();
                        }


                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(EditActivity.this,
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

    //save edit blm selesai bossss
    private void SaveEditDetail() {

        final String name       = this.name.getText().toString().trim();
        final String tgl_lahir  = this.tgl_lahir.getText().toString().trim();
        final String alamat     = this.alamat.getText().toString().trim();
        final String email      = this.email.getText().toString().trim();
        final String password   = this.password.getText().toString().trim();

        final String id         = getId;

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Saving...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_EDIT,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        progressDialog.dismiss();

                        try
                        {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1"))
                            {
                                Toast.makeText(EditActivity.this,
                                        "Success !", Toast.LENGTH_SHORT)
                                        .show();

                                sessionManager.createSession(name, tgl_lahir, alamat, email, password, id);
                            }
                        }
                        catch (JSONException e) {
                            e.printStackTrace();

                            progressDialog.dismiss();

                            Toast.makeText(EditActivity.this,
                                    "Error "+e.toString(), Toast.LENGTH_SHORT)
                                    .show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        progressDialog.dismiss();

                        Toast.makeText(EditActivity.this,
                                "Error "+error.toString(), Toast.LENGTH_SHORT)
                                .show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {

                Map<String, String> params = new HashMap<>();
                params.put("name",      name);
                params.put("tgl_lahir", tgl_lahir);
                params.put("alamat",    alamat);
                params.put("email",     email);
                params.put("password",  password);
                params.put("id",        id);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

    @Override
    protected void onResume() {
        super.onResume();
        nip.setFocusableInTouchMode(false);
        name.setFocusableInTouchMode(false);
        email.setFocusableInTouchMode(false);
        tgl_lahir.setFocusableInTouchMode(false);
        alamat.setFocusableInTouchMode(false);
        password.setFocusableInTouchMode(false);
        getUserDetail();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.menu_action, menu);

        action = menu;
        action.findItem(R.id.menu_save).setVisible(false);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch (item.getItemId()){
            case R.id.menu_edit :

                /*name.setFocusableInTouchMode(true);
                email.setFocusableInTouchMode(true);*/

                nip.setFocusableInTouchMode(false);
                name.setFocusableInTouchMode(true);
                email.setFocusableInTouchMode(true);
                tgl_lahir.setFocusableInTouchMode(true);
                alamat.setFocusableInTouchMode(true);
                password.setFocusableInTouchMode(true);


                InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                imm.showSoftInput(name, InputMethodManager.SHOW_IMPLICIT);

                action.findItem(R.id.menu_edit).setVisible(false);
                action.findItem(R.id.menu_save).setVisible(true);

                return true;

            case R.id.menu_save :

                SaveEditDetail();

                action.findItem(R.id.menu_edit).setVisible(true);
                action.findItem(R.id.menu_save).setVisible(false);

                /*name.setFocusableInTouchMode(false);
                email.setFocusableInTouchMode(false);*/

                nip.setFocusableInTouchMode(false);
                name.setFocusableInTouchMode(false);
                email.setFocusableInTouchMode(false);
                tgl_lahir.setFocusableInTouchMode(false);
                alamat.setFocusableInTouchMode(false);
                password.setFocusableInTouchMode(false);

                nip.setFocusable(false);
                name.setFocusable(false);
                email.setFocusable(false);
                tgl_lahir.setFocusable(false);
                alamat.setFocusable(false);
                password.setFocusable(false);

                return true;

            default:
                return super.onOptionsItemSelected(item);
        }
    }

    private void chooseFile() {

        Intent intent = new Intent();
        intent.setType("Image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Picture"), 1);

    }

    @Override
    protected void onActivityResult(int  requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == 1 && resultCode == RESULT_OK && data != null && data.getData() != null)
        {
            Uri filePath = data.getData();

            try
            {
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                profile_image.setImageBitmap(bitmap);
            }
            catch (IOException e)
            {
                e.printStackTrace();
            }

            UploadPicture(getId, getStringImage(bitmap));

        }
    }

    private void UploadPicture(final String id, final String photo) {

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Uploading...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_UPLOAD,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        progressDialog.dismiss();
                        Log.i(TAG, response.toString());

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1"))
                            {
                                Toast.makeText(EditActivity.this,
                                        "Success !", Toast.LENGTH_SHORT)
                                        .show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(EditActivity.this,
                                    "Coba Lagi !" + e.toString(), Toast.LENGTH_SHORT)
                                    .show();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        progressDialog.dismiss();
                        Toast.makeText(EditActivity.this,
                                "Coba Lagi !" + error.toString(), Toast.LENGTH_SHORT)
                                .show();

                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id", id);
                params.put("photo", photo);

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    public String getStringImage(Bitmap bitmap){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);

        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        String encodedImage = Base64.encodeToString(imageByteArray, Base64.DEFAULT);

        return encodedImage;
    }

}
