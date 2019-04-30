package BL;

import org.junit.Test;
import static org.junit.Assert.*;

public class CypherCodeTest {
    private final Cypher cypher;
    
    public CypherCodeTest() {
        this.cypher = new Cypher();
    }
    
    @Test
    public void holaTest1(){
        this.cypher.setText("HOLA");
        this.cypher.setBase(1);
        assertEquals("IPMB", this.cypher.code());
    }
    @Test
    public void holaTest20(){
        this.cypher.setText("HOLA");
        this.cypher.setBase(20);
        assertEquals("915T", this.cypher.code());
    }
    @Test
    public void holaTest30(){
        this.cypher.setText("HOLA");
        this.cypher.setBase(30);
        assertEquals("AIE6", this.cypher.code());
    }
    @Test
    public void randomTest(){
        this.cypher.setText("HOLA SoY uNa FrAsE larga CON IDENTIFICADOR 501");
        this.cypher.setBase(5);
        assertEquals("MTPF Xo6 uRa KrFsJ larga HTR NIJRYNKNHFITW 0ED", this.cypher.code());
    }
}
