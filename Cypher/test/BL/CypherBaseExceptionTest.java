package BL;

import BL.Exceptions.InvalidBaseException;
import org.junit.Test;

public class CypherBaseExceptionTest {
    private final Cypher cypher;
    
    public CypherBaseExceptionTest() {
        this.cypher = new Cypher();
    }
    
    @Test(expected = InvalidBaseException.class)
    public void negativeBaseTest() throws InvalidBaseException{
        this.cypher.setBase(-1);
    }
    @Test(expected = Test.None.class)
    public void notNegativeBaseTest() throws InvalidBaseException{
        this.cypher.setBase(3);
    }
    @Test(expected = InvalidBaseException.class)
    public void tooLongBaseTest() throws InvalidBaseException{
        this.cypher.setBase(350);
    }
    @Test(expected = Test.None.class)
    public void notTooLongBaseTest() throws InvalidBaseException{
        this.cypher.setBase(150);
    }
}