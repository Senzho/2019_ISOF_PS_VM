package BL.Exceptions;

public class InvalidBaseException extends Exception {
    private final String message;
    
    public InvalidBaseException(BaseError error){
        this.message = "Base no válida. La base es " 
                + (error.equals(BaseError.NEGATIVE) ? "negativa" : "muy grande") 
                + ". Ingresa una base válida.";
    }
    
    @Override
    public String getMessage(){
        return this.message;
    }
    
    public enum BaseError{
        NEGATIVE,
        TOO_LONG;
    }
}
