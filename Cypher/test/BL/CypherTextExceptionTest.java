package BL;

import BL.Exceptions.NullTextException;
import org.junit.Test;

public class CypherTextExceptionTest {
    private final Cypher cypher;
    
    public CypherTextExceptionTest() {
        this.cypher = new Cypher();
    }
    
    @Test(expected = NullTextException.class)
    public void nullTextTest() throws NullTextException{
        this.cypher.setText(null);
    }
    @Test(expected = Test.None.class)
    public void notNullTextTest() throws NullTextException{
        this.cypher.setText("IPMB");
    }
    @Test(expected = NullTextException.class)
    public void emptyTextTest() throws NullTextException{
        this.cypher.setText("");
    }
    @Test(expected = Test.None.class)
    public void notEmptyTextTest() throws NullTextException{
        this.cypher.setText("IPMB");
    }
}
