package AST;
import AST.Visitor.Visitor;

public abstract class Program extends ASTNode{
	  public Program(int ln) {
	    super(ln);
	  }
	  public abstract void accept(Visitor v);
	}

