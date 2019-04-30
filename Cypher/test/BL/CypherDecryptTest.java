package BL;

import org.junit.Test;
import static org.junit.Assert.*;

public class CypherDecryptTest {
    private final Cypher cypher;
    
    public CypherDecryptTest() {
        this.cypher = new Cypher();
    }
    
    @Test
    public void holaTest1(){
        this.cypher.setText("IPMB");
        this.cypher.setBase(1);
        assertEquals("HOLA", this.cypher.decrypt());
    }
    @Test
    public void holaTest20(){
        this.cypher.setText("915T");
        this.cypher.setBase(20);
        assertEquals("HOLA", this.cypher.decrypt());
    }
    @Test
    public void holaTest30(){
        this.cypher.setText("AIE6");
        this.cypher.setBase(30);
        assertEquals("HOLA", this.cypher.decrypt());
    }
    @Test
    public void randomTest(){
        this.cypher.setText("MTPF Xo6 uRa KrFsJ larga HTR NIJRYNKNHFITW 0ED");
        this.cypher.setBase(5);
        assertEquals("HOLA SoY uNa FrAsE larga CON IDENTIFICADOR 501", this.cypher.decrypt());
    }
}
