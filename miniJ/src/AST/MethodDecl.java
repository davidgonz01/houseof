package AST;

import AST.Visitor.Visitor;

public abstract class MethodDecl extends ASTNode{
  public MethodDecl(int ln) {
    super(ln);
  }
  public abstract void accept(Visitor v);
  
}
