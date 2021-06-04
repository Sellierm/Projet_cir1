#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
#include <stdbool.h>

#define taille 5


void displaytab(char tab[taille][taille]) {
	//affichage tableau
	for (int k = 0; k < taille; k++) {
		for (int l = 0; l < taille; l++) {
			printf("%c ", tab[k][l]);
		}
		printf("\n");
	}printf("\n\n");
}

/* les données à récupérer doivent se trouver dans un fichier texte dans C:/Users/Administrateur/Downloads/data.txt    ,si vous voulez modifier le chemin, ligne 37*/
/* sous le format opérateur1,opérateur2,...;solution ligne 1,solution ligne 2;solution colonne 1,solution colonne 2,...;*/

/*les données sont renvoyés dans un fichier txt C:/Users/Administrateur/Downloads/Solutions.txt  , si vous voulez le changer, ligne 446*/
/*sous le format chiffre1,chiffre2,...,*/

int main() {
	srand(time(NULL));

	FILE* file;
	char buffer[50] = { "\0" };
	_set_errno(0);
	errno_t(err);


	if (((err = fopen_s(&file, "C:/Users/Administrateur/Downloads/data.txt", "r")) != 0))
	{
		return(err);
	}

	while (!feof(file)) {
		if (fgets(buffer, 50, file) != NULL) {
			printf("%s", buffer);
		}
	}




	char symbolList[13];
	int solutionligne[5];
	int solutioncolonne[5];

	symbolList[12] = '\0';
	solutionligne[4] = '\0';
	solutioncolonne[4] = '\0';

	char temp[5] = { "\0" };



	int p = 0;
	int k = 0;
	while (buffer[p] != ';') {
		if (buffer[p] != ',') {
			symbolList[k] = buffer[p];
			k++;
		}
		p++;
	}
	p++;

	//solutions des lignes
	k = 0;
	int q = 0;
	while (buffer[p] != ';') {
		if (buffer[p] != ',' && buffer[p] != ';') {
			temp[q] = buffer[p];
			q++;
			p++;
		}
		else {
			p++;
			q = 0;
			solutionligne[k] = atoi(temp);
			k++;
			for (int i = 0; i < 5; i++) {
				temp[i] = '\0';
			}
		}
		if (buffer[p] == ';') {
			solutionligne[k] = atoi(temp);
			for (int i = 0; i < 5; i++) {
				temp[i] = '\0';
			}
		}
	}
	p++;


	//solutions des colonnes
	k = 0;
	q = 0;
	while (buffer[p] != ';') {
		if (buffer[p] != ',' && buffer[p] != ';') {
			temp[q] = buffer[p];
			q++;
			p++;
		}
		else {
			p++;
			q = 0;
			solutioncolonne[k] = atoi(temp);
			k++;
			for (int i = 0; i < 5; i++) {
				temp[i] = '\0';
			}
		}
		if (buffer[p] == ';') {
			solutioncolonne[k] = atoi(temp);
			for (int i = 0; i < 5; i++) {
				temp[i] = '\0';
			}
		}
	}

	fclose(file);



	// portes de l'enfer
	//alias le solveur
	// 
	//on copie le tableau pb dans un autre, idem pour les chiffres
	char nbrchiffre[10];
	for (int i = 1; i < 10; i++) {
		nbrchiffre[i] = 1;

	}
	nbrchiffre[0] = 0;



	char opperateur[3];
	opperateur[2] = '\0';
	char chiffr[4];
	chiffr[3] = '\0';

	char opperateur2[3];
	opperateur2[2] = '\0';
	char chiffr2[4];
	chiffr2[3] = '\0';
	int tmp;
	char tableau_prob[taille][taille];


	for (int i = 1; i < taille; i += 2) {
		for (int j = 1; j < taille; j += 2) {
			tableau_prob[i][j] = ' ';
		}
	}
	k = 0;

	for (int i = 0; i < taille; i++) {
		for (int j = 0; j < taille; j++) {
			if (i % 2 == 0 && j % 2 != 0) {
				tableau_prob[i][j] = symbolList[k];
				k++;
			}
			if (i % 2 != 0 && j % 2 == 0) {
				tableau_prob[i][j] = symbolList[k];
				k++;
			}
		}
	}
	printf("\n\n");

	displaytab(tableau_prob);

	//on copie les nbr utilisés pour revenir en arriere si pas le bon résultat
	char copienbr[10];
	for (int i = 0; i < 10; i++) {
		copienbr[i] = nbrchiffre[i];
	}


	//indice pour parcourir solution ligne/colonne pour vérifier si ok
	int indicesolution = 0;
	//condition d'arret
	bool result = false;


	//on génére un tableau aléatoire
	for (int i = 0; i < taille; i += 2) {
		for (int j = 0; j < taille; j += 2) {
			do {
				tmp = rand() % 10;
			} while (copienbr[tmp] < 1);
			tableau_prob[i][j] = tmp + 48;
			copienbr[tmp] = copienbr[tmp] - 1;
		}
	}
	displaytab(tableau_prob);

	int i = 0;
	while (!result) {

		//on récupére les opérateurs sur la ligne (i)
		k = 0;
		for (int j = 1; j < taille; j += 2) {
			opperateur[k] = tableau_prob[i][j];
			//printf("%c", opperateur[k]);
			k++;
		}

		k = 0;
		//on récupére les chiffres
		for (int j = 0; j < taille; j += 2) {
			//on remet les valeurs en int
			chiffr[k] = tableau_prob[i][j] - 48;
			//printf("%d", chiffr[k]);
			k++;
		}printf("\n");

		//si prioritée opératoire
		if (taille == 5 && (opperateur[1] == '/' || opperateur[1] == '*') && (opperateur[0] == '-' || opperateur[0] == '+')) {
			tmp = 0;
			switch (opperateur[1])
			{
			case '*':
				tmp = (chiffr[1]) * (chiffr[2]);
				break;
			case '/':
				tmp = (chiffr[1]) / (chiffr[2]);
				break;
			}
			//printf("\n%1 %d", tmp);

			switch (opperateur[0]) {
			case '-':
				tmp = (chiffr[0]) - tmp;
				break;
			case '+':
				tmp = (chiffr[0]) + tmp;
				break;

			}
			//printf("\n2 %d", tmp);
		}
		//sinon opération classique
		else {

			tmp = 0;

			//on effectue les calculs sans prioritée
			switch (opperateur[0]) {
			case '+':
				tmp = (chiffr[0]) + (chiffr[1]);
				break;
			case '-':
				tmp = (chiffr[0]) - (chiffr[1]);
				break;
			case '*':
				tmp = (chiffr[0]) * (chiffr[1]);
				break;
			case '/':
				tmp = (chiffr[0]) / (chiffr[1]);
				break;
			}
			//printf("\n\n1: %d", tmp);


			switch (opperateur[1]) {
			case '+':
				tmp = tmp + (chiffr[2]);
				break;
			case '-':
				tmp = tmp - (chiffr[2]);
				break;
			case '*':
				tmp = tmp * (chiffr[2]);
				break;
			case '/':
				tmp = tmp / (chiffr[2]);
				break;
			}
			//printf("\n%d: %d", l, tmp);
		}printf("\nligne %d :%d %d\n", i / 2 + 1, tmp, solutionligne[indicesolution]);

		//si le résultat ducalcul est le meme que celui de la solution
		if (tmp == solutionligne[indicesolution]) {
			//on passe à la ligne suivante
			i += 2;
			indicesolution++;
		}
		else {
			//sinon on repart avec les chiffres de base
			for (int i = 0; i < 10; i++) {
				copienbr[i] = nbrchiffre[i];
			}
			indicesolution = 0;
			i = 0;
			//on regénére un tableau
			for (int i = 0; i < taille; i += 2) {
				for (int j = 0; j < taille; j += 2) {
					do {
						tmp = rand() % 10;
					} while (copienbr[tmp] < 1);
					tableau_prob[i][j] = tmp + 48;
					copienbr[tmp] = copienbr[tmp] - 1;
				}
			}
		}



		//on regarde les colonnes si lignes ok
		if (i == 6) {
			indicesolution = 0;
			int c = 0;
			//on vérifie colonne
			while (c < taille) {
				//on récupére les opérateurs
				k = 0;
				for (int l = 1; l < taille; l += 2) {
					opperateur2[k] = tableau_prob[l][c];
					k++;
				}
				k = 0;
				for (int l = 0; l < taille; l += 2) {
					//on remet les valeurs en int
					chiffr2[k] = tableau_prob[l][c] - 48;
					k++;
				}

				if (taille == 5 && (opperateur2[1] == '/' || opperateur2[1] == '*') && (opperateur2[0] == '-' || opperateur2[0] == '+')) {
					tmp = 0;
					switch (opperateur2[1])
					{
					case '*':
						tmp = (chiffr2[1]) * (chiffr2[2]);
						break;
					case '/':
						tmp = (chiffr2[1]) / (chiffr2[2]);
						break;
					}
					//printf("\n%1 %d", tmp);

					switch (opperateur2[0]) {
					case '-':
						tmp = (chiffr2[0]) - tmp;
						break;
					case '+':
						tmp = (chiffr2[0]) + tmp;
						break;

					}
					//printf("\n2 %d", tmp);
				}
				else {
					tmp = 0;

					//on effectue les calculs sans prioritée
					switch (opperateur2[0]) {
					case '+':
						tmp = (chiffr2[0]) + (chiffr2[1]);
						break;
					case '-':
						tmp = (chiffr2[0]) - (chiffr2[1]);
						break;
					case '*':
						tmp = (chiffr2[0]) * (chiffr2[1]);
						break;
					case '/':
						tmp = (chiffr2[0]) / (chiffr2[1]);
						break;
					}
					//printf("\n\n1: %d", tmp);


					switch (opperateur2[1]) {
					case '+':
						tmp = tmp + (chiffr2[2]);
						break;
					case '-':
						tmp = tmp - (chiffr2[2]);
						break;
					case '*':
						tmp = tmp * (chiffr2[2]);
						break;
					case '/':
						tmp = tmp / (chiffr2[2]);
						break;
					}
					//printf("\n%d: %d", l, tmp);

				}printf("\ncolonne : %d :%d %d\n", c / 2 + 1, tmp, solutioncolonne[indicesolution]);

				if (tmp == solutioncolonne[indicesolution]) {
					c += 2;
					indicesolution++;
					if (c == 6) {
						result = true;
					}
				}

				else {
					i = 0;
					for (int i = 0; i < 10; i++) {
						copienbr[i] = nbrchiffre[i];
					}
					indicesolution = 0;
					for (int i = 0; i < taille; i += 2) {
						for (int j = 0; j < taille; j += 2) {
							do {
								tmp = rand() % 10;
							} while (copienbr[tmp] < 1);
							tableau_prob[i][j] = tmp + 48;
							copienbr[tmp] = copienbr[tmp] - 1;
						}
					}
					break;
				}

			}
		}
	}
	printf("\n\nSolution :\n");
	displaytab(tableau_prob);


	char buffer3[20] = { "\0" };
	char ordrec[11] = { "\0" };
	k = 0;
	for (int i = 0; i < taille; i++) {
		for (int j = 0; j < taille; j++) {
			if (tableau_prob[i][j] >= '1' && tableau_prob[i][j] <= '9') {
				ordrec[k] = tableau_prob[i][j];
				k++;
			}
		}
	}

	if (((err = fopen_s(&file, "C:/Users/Administrateur/Downloads/Solutions.txt", "w")) != 0) || (file == NULL))
	{
		return(err);
	}

	//printf("\n%s", ordrec);
	for (int i = 0; i < 10; i++) {
		sprintf_s(buffer3, 20, "%c", ordrec[i]);
		fputs(buffer3, file);
		if (i != 9) {
			sprintf_s(buffer3, 20, ",");
			fputs(buffer3, file);
		}
	}

	fclose(file);
	return EXIT_SUCCESS;
}