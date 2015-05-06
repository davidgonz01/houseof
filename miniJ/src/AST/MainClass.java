package AST;
import AST.Visitor.Visitor;

public abstract class MainClass extends ASTNode{
	  public MainClass(int ln) {
	    super(ln);
	  }
	  public abstract void accept(Visitor v);
	 
	}


