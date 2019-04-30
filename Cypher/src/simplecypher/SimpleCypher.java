package simplecypher;

import BL.Cypher;

public class SimpleCypher {
    public static void main(String[] args) {
        String text = "HoLa/79°";
        int base = 5;
        Cypher cypher = new Cypher(text, base);
        System.out.println("Texto ingresado: " + cypher.getText() + ", base: " + cypher.getBase());
        String code = cypher.crypt();
        System.out.println("Codificado: " + code);
        cypher.setText(code);
        System.out.println("Decodificado: " + cypher.decrypt());
    }
}
