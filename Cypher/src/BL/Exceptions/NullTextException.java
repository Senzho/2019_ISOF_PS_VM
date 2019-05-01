package BL.Exceptions;

public class NullTextException extends Exception {
    private final String message;
    
    public NullTextException(TextError error){
        this.message = "Cadena no válida. La cadena " 
                + (error.equals(TextError.NULL) ? "es nula" : "está vacía") 
                + ". Ingresa una cadena válida.";
    }
    
    @Override
    public String getMessage(){
        return this.message;
    }
    
    public enum TextError{
        NULL,
        ZERO_LENGTH;
    }
}
