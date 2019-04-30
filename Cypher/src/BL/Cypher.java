package BL;

public class Cypher {
    private final char[] circle = {'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0'};
    
    private String text;
    private int base;
    
    private int getCharacterPosition(char character){
        int position = -1;
        for (int i = 0; i < this.circle.length; i ++){
            if (character == this.circle[i]){
                position = i;
                break;
            }
        }
        return position;
    }
    
    public Cypher(){}
    public Cypher(String text, int base){
        this.text = text;
        this.base = base;
    }
    
    public void setText(String text){
        this.text = text;
    }
    public void setBase(int base){
        this.base = base;
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
                while (position >= this.circle.length){
                    position = position - this.circle.length;
                }
                code = code.concat(String.valueOf(this.circle[position]));
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
                    position = position + this.circle.length;
                }
                result = result.concat(String.valueOf(this.circle[position]));
            }   
        }
        return result;
    }
}
