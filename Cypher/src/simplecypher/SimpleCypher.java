package simplecypher;

import BL.Cypher;
import BL.Exceptions.InvalidBaseException;
import BL.Exceptions.NullTextException;

public class SimpleCypher {
    public static void main(String[] args) {
        String text = "ZS15011641";
        int base = 80;
        Cypher cypher = new Cypher();
        try{
            cypher.setText(text);
            cypher.setBase(base);
            System.out.println("Texto ingresado: " + cypher.getText() + ", base: " + cypher.getBase());
            String code = cypher.code();
            System.out.println("Codificado: " + code);
            cypher.setText(code);
            System.out.println("Decodificado: " + cypher.decode());
        }catch(NullTextException | InvalidBaseException exception){
            System.out.println("Excepción producida: " + exception.getMessage());
        }
    }
}
