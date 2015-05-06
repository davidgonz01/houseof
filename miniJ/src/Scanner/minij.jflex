/*
 * JFlex specification for the lexical analyzer for a simple demo language.
 * Change this into the scanner for your implementation of MiniJ.
 */


package Scanner;

import java_cup.runtime.*;
import Parser.sym;

%%

%public
%final
%class scanner
%unicode
%cup
%line
%column

/* Code copied into the generated scanner class.  */
/* Can be referenced in scanner action code. */
%{
  // Return new symbol objects with line and column numbers in the symbol 
  // left and right fields. This abuses the original idea of having left 
  // and right be character positions, but is   // is more useful and 
  // follows an example in the JFlex documentation.
  private Symbol symbol(int type) {
    return new Symbol(type, yyline+1, yycolumn+1);
  }
  private Symbol symbol(int type, Object value) {
    return new Symbol(type, yyline+1, yycolumn+1, value);
  }

 // Return a readable representation of symbol s (aka token)
  public String symbolToString(Symbol s) {
    String rep;
    switch (s.sym) {
            case sym.AND: return "AND";
		      case sym.BECOMES: return "BECOMES";
		      case sym.BOOLEAN: return "BOOLEAN";
		      case sym.CBRACKET: return "CBRACKET";
		      case sym.CKEY: return "CKEY";
		      case sym.CLASS: return "CLASS";
		      case sym.COMMA: return "COMMA";
		      case sym.DISPLAY: return "DISPLAY";
		      case sym.DIVIDE: return "DIVIDE";
		      case sym.DOT: return "DOT";
		      case sym.DOUBLE: return "DOUBLE";
		      case sym.ELSE: return "ELSE";
		      case sym.EOF: return "<EOF>";
		      case sym.error: return "<ERROR>";
		      case sym.EXTENDS: return "EXTENDS";
		      case sym.FALSE: return "FALSE";
		      case sym.FOR: return "FOR";
		      case sym.IDENTIFIER: return "ID(" + (String)s.value + ")";
		      case sym.IF: return "IF";
		      case sym.IMPORT: return "IMPORT";
		      case sym.INT: return "INT";
		      case sym.LENGTH: return "LENGTH";
		      case sym.LPAREN: return "LPAREN";
		      case sym.LTHAN: return "LTHAN";
		      case sym.MAIN: return "MAIN";
		      case sym.MINUS: return "MINUS";
		      case sym.MTHAN: return "MTHAN";
		      case sym.NEW: return "NEW";
		      case sym.NOT: return "NOT";
		      case sym.NULL: return "NULL";
		      case sym.NUMBERS: return "NUMBERS(" + String.valueOf(s.value) + ")";
		      case sym.OBRACKET: return "OBRACKET";
		      case sym.OKEY: return "OKEY";
		      case sym.OR: return "OR";
		      case sym.PLUS: return "PLUS";
		      case sym.PRIVATE: return "PRIVATE";
		      case sym.PUBLIC: return "PUBLIC";
		      case sym.RETURN: return "RETURN";
		      case sym.RPAREN: return "RPAREN";
		      case sym.SEMICOLON: return "SEMICOLON";
		      case sym.STATIC: return "STATIC";
		      case sym.STRING: return "STRING";
		      case sym.SYSTEMOUTPRINTLN: return "SYSTEMOUTPRINTLN";
		      case sym.THIS: return "THIS";
		      case sym.TIMES: return "TIMES";
		      case sym.TRUE: return "TRUE";
		      case sym.VOID: return "VOID";
		      case sym.WHILE: return "WHILE";
      		default: return "<UNEXPECTED TOKEN " + s.toString() + ">";
      
      
      
    }
  }
%}

/* Helper definitions */
digit = 	[0-9]
letter =    [a-zA-Z]
eol = 		[\r\n]
white = 	{eol}|[ \t]
comment = 	"//".*"\n" | "/*".*"*/"
numbers = 	0 | [1-9][0-9]*

%%

/* Token definitions */

/* reserved words */
/* (put here so that reserved words take precedence over identifiers) */
"display"	 { return symbol(sym.DISPLAY); }
"import" 	 { return symbol(sym.IMPORT); }
"public"	 { return symbol(sym.PUBLIC); }
"private"	 { return symbol(sym.PRIVATE); }
"class" 	 { return symbol(sym.CLASS); }
"new"		 { return symbol(sym.NEW); }
"null"		 { return symbol(sym.NULL); }
"void"		 { return symbol(sym.VOID); }
"static" 	 { return symbol(sym.STATIC); }
"return"	 { return symbol(sym.RETURN); }
"main" 		 { return symbol(sym.MAIN); }
"if" 		 { return symbol(sym.IF); }
"else" 		 { return symbol(sym.ELSE); }
"for"		 { return symbol(sym.FOR); }
"while"		 { return symbol(sym.WHILE); }
"this"		 { return symbol(sym.THIS); }
"int" 		 { return symbol(sym.INT); }
"double" 	 { return symbol(sym.DOUBLE); }
"boolean"	 { return symbol(sym.BOOLEAN); }
"String" 	 { return symbol(sym.STRING); }
"length"	 { return symbol(sym.LENGTH); }
"System.out.println" { return symbol(sym.SYSTEMOUTPRINTLN); }
"true" 		{ return symbol(sym.TRUE); }
"false" 	{ return symbol(sym.FALSE); }
"extends"   { return symbol(sym.EXTENDS); }




/* operators */
"+" { return symbol(sym.PLUS); }
"=" { return symbol(sym.BECOMES); }
"-" { return symbol(sym.MINUS); }
"/"	{ return symbol(sym.DIVIDE); }
"*" { return symbol(sym.TIMES); }
"<" { return symbol(sym.LTHAN); }
">" { return symbol(sym.MTHAN); }
"&&" { return symbol(sym.AND); }
"||" { return symbol(sym.OR); }
"!" { return symbol(sym.NOT); }



/* delimiters */
"(" { return symbol(sym.LPAREN); }
")" { return symbol(sym.RPAREN); }
"{"	{ return symbol(sym.OKEY); }
"}"	{ return symbol(sym.CKEY);}
";" { return symbol(sym.SEMICOLON); }
"[" { return symbol(sym.OBRACKET);}
"]"	{ return symbol(sym.CBRACKET); }
"." { return symbol(sym.DOT); }
"," { return symbol(sym.COMMA); }

/* identifiers */
{letter} ({letter}|{digit}|_)* { return symbol(sym.IDENTIFIER, yytext()); }


/* Numbers */
{numbers} {return symbol(sym.NUMBERS, Integer.valueOf(yytext()));}

/* whitespace */
{white}+ { /* ignore whitespace */ }
{comment} { /* ignore comment */}

/* lexical errors (put last so other matches take precedence) */
. { System.err.println(
	"\nunexpected character in input: '" + yytext() + "' at line " +
	(yyline+1) + " column " + (yycolumn+1));
  }
