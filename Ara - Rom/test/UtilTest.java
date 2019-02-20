import static org.junit.Assert.*;
import org.junit.Test;
import romannumbers.Util;

public class UtilTest {
    public UtilTest() {
        
    }
    
    @Test
    public void test3999(){
        assertEquals("MMMCMXCIX", Util.getRomanFromArabic(3999));
    }
    @Test
    public void test2400(){
        assertEquals("MMCD", Util.getRomanFromArabic(2400));
    }
    @Test
    public void test48(){
        assertEquals("XLVIII", Util.getRomanFromArabic(48));
    }
    @Test
    public void test1000(){
        assertEquals("M", Util.getRomanFromArabic(1000));
    }
    @Test
    public void test1784(){
        assertEquals("MDCCLXXXIV", Util.getRomanFromArabic(1784));
    }
    @Test
    public void test419(){
        assertEquals("CDXIX", Util.getRomanFromArabic(419));
    }
}
