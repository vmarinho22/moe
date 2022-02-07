package br.com.sistemamoe.moe;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Html;
import android.text.method.LinkMovementMethod;
import android.text.util.Linkify;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;



public class Login extends AppCompatActivity{
    EditText login, senha;
    String login2,senha2;
    Dados dados = new Dados();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        login = (EditText) findViewById(R.id.txt_login);
        senha = (EditText) findViewById(R.id.txt_senha);
        Button entra = (Button) findViewById(R.id.btn_entrar);
        entra.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                login2 = login.getText().toString();
                senha2 = senha.getText().toString();

                if(login2.equals("") || senha2.equals("")){
                    Toast.makeText(getApplicationContext(),"Campos Vazios!!!",Toast.LENGTH_SHORT).show();
                }else{
                    //Toast.makeText(getApplicationContext(),"Entrou",Toast.LENGTH_SHORT).show();
                    login.setText("");
                    senha.setText("");
                    login.setFocusable(true);
                    if(isOnline()) {
                        //Toast.makeText(getApplicationContext(),"Entrou aqui", Toast.LENGTH_SHORT).show();
                        validarLogin();
                    }else{
                        Toast.makeText(getApplicationContext(),"Sem conexão com Internet", Toast.LENGTH_SHORT).show();
                    }
                }
                //startActivity(new Intent(getApplicationContext(), Menu.class));
            }

        });
    }

    public void validarLogin() {
        String url = "http://www.sistemamoe.com.br/moe/Loginapp.php";
        StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //Toast.makeText(getApplicationContext(),response, Toast.LENGTH_SHORT).show();

                        if(response.trim().equals("true")){
                            dados.setMatricula(login2);
                            //Toast.makeText(getApplicationContext(),"Entrou", Toast.LENGTH_SHORT).show();
                            startActivity(new Intent(getApplicationContext(),Menu.class));
                        }else {
                            Toast.makeText(getApplicationContext(),"Usuário Invalido", Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.d("Error.Response", error.toString());
                    }
                }
        ) {
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("login", login2);
                params.put("senha", senha2);
                params.put("server", "app");
                return params;
            }
        };
        RequestQueue queue = Volley.newRequestQueue(this);
        queue.add(postRequest);
    }

    public boolean isOnline() {
        ConnectivityManager manager = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);

        return manager.getActiveNetworkInfo() != null &&
                manager.getActiveNetworkInfo().isConnectedOrConnecting();
    }

}