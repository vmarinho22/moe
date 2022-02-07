package br.com.sistemamoe.moe;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.webkit.WebView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class Ocorrencias extends AppCompatActivity {
    Dados dados = new Dados();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ocorrencias);

        WebView webView = new WebView(this);
        setContentView(webView);
        webView.loadUrl("http://sistemamoe.com.br/moe/Ocorrenciasapp.php?matricula="+dados.getMatricula());

    }
}
