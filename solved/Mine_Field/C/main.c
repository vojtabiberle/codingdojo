#include<stdio.h>
#include<stdlib.h>
#include<ctype.h>

typedef struct size {
  int x;
  int y;
} Size;

typedef struct field {
  int** cell;
  Size rozmery;
} Field;

//Memory management
int createField(Field* result);
void freeField(Field* field);

//Filling methods
int getHeader(FILE* inField, Size* rozmery);
void fillField(FILE* inField, Field* outField);
void fillSurround(Field* outField, int x, int y);
int isMineReaded(char cell);
char getCharacter(FILE* inField);

//Printing methods
void printField(Field* field);
int isMine(int cell);

int main(int argc, char** argv) {
  int error = 0;
  FILE *inField = NULL;
  if (argc == 2) {
    inField = fopen(argv[1], "r");
    if (inField == NULL) {
      return 2;
    }
  }
  else if (argc == 1) {
    inField = stdin;
  }
  else {
    fprintf(stderr, "Nespravne parametry programu");
    return 2;
  }
  
  Field outField;
  error = getHeader(inField, &(outField.rozmery));
  if (error != 0) {
    fprintf(stderr, "Nespravne nactene rozmery");
    return 3;
  }

  error = createField(&outField);
  if (error != 0) {
    fprintf(stderr, "Chybna alokace - nedostatek pameti");
    return 4;
  }

  fillField(inField, &outField);
  printField(&outField);
  fclose(inField);
  freeField(&outField);
}

int getHeader(FILE* inField, Size* rozmery) {
  if (fscanf(inField, "%d", &(rozmery->x)) == 0) {
    return 1;
  }
  if (fscanf(inField, "%d", &(rozmery->y)) == 0) {
    return 1;
  }
  return 0;
}

int createField(Field* result) {
  result->cell = (int**)malloc(sizeof(int*)*result->rozmery.y);
  if (result->cell == NULL) {
    return 1;
  }

  for(int i = result->rozmery.y - 1; i >= 0; --i) {
    result->cell[i] = (int*)malloc(sizeof(int)*result->rozmery.x);
    if (result->cell[i] == NULL) {
      return 1;
    }
    for(int j = 0; j < result->rozmery.x; ++j) {
      result->cell[i][j] = 0;
    }
  }
  return 0;
}

void freeField(Field* field) {
  for (int y = 0; y < field->rozmery.y; ++y) {
    free(field->cell[y]);
  }
  free(field->cell);
}

void fillField(FILE* inField, Field* outField) {
  int rozmerY = outField->rozmery.y;
  int rozmerX = outField->rozmery.x;

  for(int y = 0; y < rozmerY; ++y) {
    for(int x = 0; x < rozmerX; ++x) {
      char cell = getCharacter(inField);
      if (isMineReaded(cell)) {
        fillSurround(outField, x, y);
      }
    }
  }
}

char getCharacter(FILE* inField) {
  char c = fgetc(inField);
  while (isspace(c)) {
    c = fgetc(inField);
  }
  return c;
}

int isMineReaded(char cell) {
  if (cell == '*') {
    return 1;
  }
  return 0;
}

void fillSurround(Field* outField, int x, int y) {
  int iStarts = -1;
  int iEnds = 1;
  int jStarts = -1;
  int jEnds = 1;

  if (x+jStarts < 0) {
    jStarts = 0;
  }
  if (x+jEnds >= outField->rozmery.x) {
    jEnds = 0;
  }
  if (y+iStarts < 0) {
    iStarts = 0;
  }
  if (y+iEnds >= outField->rozmery.y) {
    iEnds = 0;
  }

  for(int i = iStarts; i <= iEnds; ++i) {
    for(int j = jStarts; j <= jEnds; ++j) {
      outField->cell[y+i][x+j]++;
    }
  }
  outField->cell[y][x] = 9;
}

void printField(Field* field) {
  for (int y = 0; y < field->rozmery.y; ++y) {
    for (int x = 0; x < field->rozmery.x; ++x) {
      if (isMine(field->cell[y][x])) {
        printf("* ");
      }
      else {
        printf("%d ", field->cell[y][x]);
      }
    }
    printf("\n");
  }
}

int isMine(int cell) {
  if (cell >= 9) {
    return 1;
  }
  return 0;
}
