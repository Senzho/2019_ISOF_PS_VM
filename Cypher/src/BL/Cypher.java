package BL;

import BL.Exceptions.InvalidBaseException;
import BL.Exceptions.NullTextException;

public class Cypher {
    private final static char[] CIRCLE = {'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0'};
    private final static int MAX_BASE_VALUE = 300;
    
    private String text;
    private int base;
    
    private int getCharacterPosition(char character){
        int position = -1;
        for (int i = 0; i < Cypher.CIRCLE.length; i ++){
            if (character == Cypher.CIRCLE[i]){
                position = i;
                break;
            }
        }
        return position;
    }
    
    public Cypher(){
        this.text = "";
        this.base = 0;
    }
    
    public void setText(String text) throws NullTextException{
        this.text = "";
        if (text == null){
            throw new NullTextException(NullTextException.TextError.NULL);
        }else if (text.isEmpty()){
            throw new NullTextException(NullTextException.TextError.ZERO_LENGTH);
        }else{
            this.text = text;
        }
    }
    public void setBase(int base) throws InvalidBaseException{
        this.base = 0;
        if (base < 0){
            throw new InvalidBaseException(InvalidBaseException.BaseError.NEGATIVE);
        }else if (base > Cypher.MAX_BASE_VALUE){
            throw new InvalidBaseException(InvalidBaseException.BaseError.TOO_LONG);
        }else{
            this.base = base;
        }
    }
    public String getText(){
        return this.text;
    }
    public int getBase(){
        return this.base;
    }
    
    public String code(){
        String code = "";
        for (char character : this.text.toCharArray()){
            int position = this.getCharacterPosition(character);
            if (position == -1){
                code = code.concat(String.valueOf(character));
            }else{
                position = position + this.base;
                while (position >= Cypher.CIRCLE.length){
                    position = position - Cypher.CIRCLE.length;
                }
                code = code.concat(String.valueOf(Cypher.CIRCLE[position]));
            }  
        }
        return code;
    }
    public String decode(){
        String result = "";
        for (char character : this.text.toCharArray()){
            int position = this.getCharacterPosition(character);
            if (position == -1){
                result = result.concat(String.valueOf(character));
            }else{
                position = position - this.base;
                while (position < 0){
                    position = position + Cypher.CIRCLE.length;
                }
                result = result.concat(String.valueOf(Cypher.CIRCLE[position]));
            }   
        }
        return result;
    }
}
