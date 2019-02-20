package romannumbers;

public class Util {
    public static String getRomanFromArabic(int number){
        String roman = "";
        String[][] romanMatrix = {{"IV", "XL", "CD"}, {"V", "L", "D"}, {"VI", "LX", "DC"}, {"VII", "LXX", "DCC"}, {"VIII", "LXXX", "DCCC"}, {"IX", "XC", "CM"}};
        char[] romanSections = {'I', 'X', 'C', 'M'};
        String numString = String.valueOf(number);
        int length = numString.length();
        int start = Integer.parseInt(String.valueOf(numString.charAt(0)));
        for (int i = 4; i > 0; i --){
            if (i == length){
                if (start > 3){
                    roman = roman.concat(romanMatrix[start - 4][i - 1]);
                }else{
                    for (int c = 0; c < start; c ++){
                        roman = roman.concat(romanSections[i - 1] + "");
                    }
                }
                numString = numString.substring(1, i);
                length = numString.length();
                if (length > 0){
                    start = Integer.parseInt(String.valueOf(numString.charAt(0)));
                }
            }
        }
        return roman;
    }
}
