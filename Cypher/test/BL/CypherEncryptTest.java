package BL;

import org.junit.Test;
import static org.junit.Assert.*;

public class CypherEncryptTest {
    private final Cypher cypher;
    
    public CypherEncryptTest() {
        this.cypher = new Cypher();
    }
    
    @Test
    public void holaTest1(){
        this.cypher.setText("HOLA");
        this.cypher.setBase(1);
        assertEquals("IPMB", this.cypher.crypt());
    }
    @Test
    public void holaTest20(){
        this.cypher.setText("HOLA");
        this.cypher.setBase(20);
        assertEquals("915T", this.cypher.crypt());
    }
    @Test
    public void holaTest30(){
        this.cypher.setText("HOLA");
        this.cypher.setBase(30);
        assertEquals("AIE6", this.cypher.crypt());
    }
    @Test
    public void randomTest(){
        this.cypher.setText("HOLA SoY uNa FrAsE larga CON IDENTIFICADOR 501");
        this.cypher.setBase(5);
        assertEquals("MTPF Xo6 uRa KrFsJ larga HTR NIJRYNKNHFITW 0ED", this.cypher.crypt());
    }
}
