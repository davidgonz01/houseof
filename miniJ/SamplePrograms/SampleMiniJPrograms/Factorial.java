public class Factorial{
    public static void main(String[] a){
    	Fac f = new Fac();
    	System.out.println(f.ComputeFac(10));
    }
}

public class Fac {

    public int ComputeFac(int num){
		int num_aux ;
		if (num < 1)
		    num_aux = 1 ;
		else 
		    num_aux = num * (this.ComputeFac(num-1)) ;
		return num_aux ;
    }

}
