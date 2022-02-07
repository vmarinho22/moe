package br.com.sistemamoe.moe;

import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.os.CountDownTimer;
import android.os.Vibrator;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.app.NotificationCompat;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.webkit.WebView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.sql.Time;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import static android.R.attr.path;

public class Menu extends AppCompatActivity {
    Dados dados = new Dados();
    String num;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);


        final Button btn_ver = (Button) findViewById(R.id.btn_ver);
        btn_ver.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if(isOnline()) {
                    startActivity(new Intent(getApplicationContext(), Ocorrencias.class));
                }else{
                    Toast.makeText(getApplicationContext(),"Sem conexão com Internet", Toast.LENGTH_SHORT).show();
                }



            }
        });

        final Button btn_sair = (Button) findViewById(R.id.btn_sair);
        btn_sair.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                System.exit(1);

            }
        });

        PegaQntdeOcorrencias();

        //Timer(1000);

    }

    public void Timer(int tempo){
        CountDownTimer countDownTimer;
        countDownTimer = new CountDownTimer(Long.MAX_VALUE,tempo) {
            @Override
            public void onTick(long millisUntilFinished) {

                Vibra(100,1000);
                Notificacao("Ocorrência","Existem novas ocorrências");

            }

            @Override
            public void onFinish() {  start(); }
        }.start();
    }


    public void PegaQntdeOcorrencias() {
        String url = "http://sistemamoe.com.br/moe/QtdeOcorrencias.php";
        StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        if(!response.trim().equals("false")) {
                            String getsweb = response;
                            String[] getweb = getsweb.split(";");
                            for (int i = 0; i < getweb.length; i++) {
                                int novo = Integer.parseInt(getweb[0]);
                                int anterior = Integer.parseInt(getweb[1]);
                                if (novo > anterior) {
                                    //Vibra(10,10);
                                    Notificacao("Ocorrência", "Existem novas ocorrências");
                                }
                                //Toast.makeText(getApplicationContext(),getweb[i], Toast.LENGTH_SHORT).show();
                            }
                        }
                        //Toast.makeText(getApplicationContext(),response, Toast.LENGTH_SHORT).show();
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
                params.put("matricula", dados.getMatricula());
                return params;
            }
        };
        RequestQueue queue = Volley.newRequestQueue(this);
        queue.add(postRequest);
    }

    public void Notificacao(String titulo,String mensagem) {
        Intent intent = new Intent(getApplicationContext(),Menu.class);
        PendingIntent pIntent = PendingIntent.getActivity(getApplicationContext(),
                (int) System.currentTimeMillis(),intent, 0);
        NotificationCompat.Builder mBuilder =
                (NotificationCompat.Builder) new NotificationCompat.Builder(getApplicationContext())
                .setSmallIcon(R.drawable.icone)
                .setContentTitle(titulo)
                .setContentText(mensagem)
                .setContentIntent(pIntent);
        NotificationManager notificationManager = (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);
        notificationManager.notify(0,mBuilder.build());
    }

    public void Vibra(int tempo_vibracao,int tempo_intervalo){
        Vibrator vibra = (Vibrator) getSystemService(this.VIBRATOR_SERVICE);
        long[] pattern  = {0,tempo_vibracao,tempo_intervalo};
        vibra.vibrate(pattern,0);
    }

    public boolean isOnline() {
        ConnectivityManager manager = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);

        return manager.getActiveNetworkInfo() != null &&
                manager.getActiveNetworkInfo().isConnectedOrConnecting();
    }

}
