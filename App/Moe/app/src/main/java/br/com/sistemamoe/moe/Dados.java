package br.com.sistemamoe.moe;


public class Dados{
    private static  String matricula;
    private static String numanterior;

    public static String getNumanterior() {
        return numanterior;
    }

    public void setNumanterior(String numanterior) {
        this.numanterior = numanterior;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public String getMatricula() {
        return matricula;
    }



}
