package BL;

import BL.Exceptions.InvalidBaseException;
import BL.Exceptions.NullTextException;
import org.junit.Test;
import static org.junit.Assert.*;

public class CypherDecodeTest {
    private final Cypher cypher;
    
    public CypherDecodeTest() {
        this.cypher = new Cypher();
    }
    
    @Test
    public void holaTest1() throws NullTextException, InvalidBaseException{
        this.cypher.setText("IPMB");
        this.cypher.setBase(1);
        assertEquals("HOLA", this.cypher.decode());
    }
    @Test
    public void holaTest20() throws NullTextException, InvalidBaseException{
        this.cypher.setText("915T");
        this.cypher.setBase(20);
        assertEquals("HOLA", this.cypher.decode());
    }
    @Test
    public void holaTest30() throws NullTextException, InvalidBaseException{
        this.cypher.setText("AIE6");
        this.cypher.setBase(30);
        assertEquals("HOLA", this.cypher.decode());
    }
    @Test
    public void randomTest() throws NullTextException, InvalidBaseException{
        this.cypher.setText("MTPF Xo6 uRa KrFsJ larga HTR NIJRYNKNHFITW 0ED");
        this.cypher.setBase(5);
        assertEquals("HOLA SoY uNa FrAsE larga CON IDENTIFICADOR 501", this.cypher.decode());
    }
}
