package AST.Visitor;

import AST.*;

public interface Visitor {
  // Display added for toy example language.  Not used in MiniJava AST
  public void visit(Display n);
  public void visit(ProgramDeclaration n);
  public void visit(ProgramDeclMain n);
  public void visit(ProgramDeclClassDeclList n);
  public void visit(MainClassDeclaration n);
  public void visit(VarDecl n);
  public void visit(Formal n);
  public void visit(IntArrayType n);
  public void visit(BooleanType n);
  public void visit(IntegerType n);
  public void visit(IdentifierType n);
  public void visit(Block n);
  public void visit(If n);
  public void visit(While n);
  public void visit(Print n);
  public void visit(Assign n);
  public void visit(ArrayAssign n);
  public void visit(And n);
  public void visit(Or n);
  public void visit(LessThan n);
  public void visit(Plus n);
  public void visit(Minus n);
  public void visit(Times n);
  public void visit(Divide n);
  public void visit(ArrayLookup n);
  public void visit(ArrayLength n);
  public void visit(Call n);
 
  public void visit(IntegerLiteral n);
  public void visit(True n);
  
  public void visit(IdentifierExp n);
  public void visit(This n);
  public void visit(NewArray n);
  public void visit(NewObject n);
  public void visit(Not n);
  public void visit(Identifier n);

  public void visit(ClassDeclExtends n);
  public void visit(ClassDeclaration n);
public void visit(MethodDeclaration n);
public void visit(MethodDeclarationFl n);
public void visit(miProgramDeclaration n);
public void visit(ClassDeclEmpty n);
public void visit(ClassDeclMethod n);
public void visit(MethodDeclSimple n);
public void visit(MethodDeclFlStatement n);


}
