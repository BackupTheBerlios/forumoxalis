                 README.TXT - Forum Oxalis v0.1.2 - 30/11/2003
--------------------------------------------------------------------------------
Ce programme est libre, vous pouvez le copier, le redistribuer et/ou le modifier
sous les termes de la GNU General Public Licence disponible � l'adresse :
http://www.gnu.org/licenses/gpl.html ou bien directement dans le fichier
LICENCE.txt
--------------------------------------------------------------------------------

Pour l'installation, voyez le fichier INSTALL.txt
Pour les instructions d'utilisation ainsi que la configuration voyez USAGE.txt

   Sommaire

   1. D�finition
     a Description rapide
     b Description des fichiers pr�sents dans l'archive
   2. N�cessit�s
   3. Fonctionnalit�s
     a Externe
     b Interne
   4. Copyright et contact
   5. Contributeur(s)
   6. Remerciements
   7. TODO / Historique
   8. Notes


1. D�finition

 a Description rapide

   "Forum Oxalis" est un forum l�ger destin� � �tre simple � configurer et �
   utiliser... en opposition aux usines � gaz de type phpBB et similaires.
   Il a �t� cr�� initialement pour http://oxalis.ehol.org ainsi que pour son
   h�bergeur : ehol.org.

   Le but �tant de combler un vide, trouvez-moi un forum comprenant toutes les
   fonctionnalit�s plac�es dans la partie 3... tout en �tant aussi l�ger !

 b Description des fichiers pr�sents dans l'archive

   Vous devez avoir t�l�charg� un fichier de type : ForumOxalis-x.x.x.tgz

   * D�compression, si vous �tes sous un Unix :
     tar -zxvf fichier.tgz
       ou
     gunzip fichier.tgz && tar -xf fichier.tgz
       ou encore
     gunzip < fichier.tgz | tar xvf -

     Si vous �tes sous un autre syst�me, la m�me manip est possible grace � :
     http://www.gzip.org/index-f.html

     Mais vous pourrez aussi vous rendre ici et prendre un programme capable de
     le faire :
     http://www.framasoft.net/rubrique214.html

   * Fichiers pr�sents apr�s la d�compression

     ForumOxalis-x.x.x/
        R�pertoire racine, vous pouvez le renommer comme bon vous semble

     ForumOxalis-x.x.x/doc
        R�pertoire contenant la documentation (il peut �tre retir� pour
        l'utilisation mais le fichier LICENCE.txt doit rester en cas de
        diffusion)

     ForumOxalis-x.x.x/doc/LICENCE.txt
        Licence du programme.

     ForumOxalis-x.x.x/doc/creertable.php
        Fichier de cr�ation de la table (lisez d'abord le INSTALL.txt).

     ForumOxalis-x.x.x/doc/README.txt
        Le fichier que vous �tes en train de lire.

     ForumOxalis-x.x.x/doc/forumoxalis.tbl
        Fichier permettant de cr�er la table sans utiliser de script (optionel).

     ForumOxalis-x.x.x/doc/INSTALL.txt
        Fichier d�crivant l'installation.

     ForumOxalis-x.x.x/doc/USAGE.txt
        Instructions d'utilisation et de configuration du forum.

	ForumOxalis-x.x.x/doc/UPGRADE.txt
        Instructions de mise � jour du forum.

     ForumOxalis-x.x.x/func.php
        Fichier interne, toutes les fonctions.

     ForumOxalis-x.x.x/index.php
        Fichier pouvant �tre retir�, il permet de cr�er le cookie et ins�re le
        fichier "forum.php" (lisez USAGE.txt).

     ForumOxalis-x.x.x/forum.php
        Le forum, fichier � inclure dans votre site en cas d'int�gration.

     ForumOxalis-x.x.x/layout.css
        Fichier d�crivant l'aspet du forum.
        Sp�cifications : http://www.yoyodesign.org/doc/w3c/css2/cover.html

     ForumOxalis-x.x.x/vars.php
        Fichier contenant les variables de configuration et de personnalisation
        (techniques) du forum.

   * Optionnel

     ForumOxalis-x.x.x/modules
	   R�pertoire contenant les modules

     ForumOxalis-x.x.x/modules/admin.php
	   Module d'administration du forum


2. N�cessit�s

   - H�bergement web
   - Une base de donn�es MySQL
   - PHP > 4.0 (vous pouvez essayer avec php3 mais je ne l'ai jamais fait)
   - Un cerveau (et un navigateur)



3. Fonctionnalit�s

 a Externe
   - Libre (sous licence GPL : http://www.gnu.org/licenses/gpl.html)
   - Conforme aux normes du W3C (http://www.w3c.org)
   - L�ger (~20ko)
   - Pas de superflu
   - Conforme � la s�paration : donn�es/interface
   - Facilement configurable visuellement grace aux CSS
   - Facilement ins�rable dans une page HTML
 b Interne
   - Affichage des r�sultats par page et selon un nombre d�finit dans vars.php
   - Possibilit� de faire des recherches dans les r�sultats
   - Mise en premier plan du sujet en cas de nouvel enregistrement
   - Affichage de la liste des sujets avec la date du dernier message
   - Mesures para-spam (remplace les "@", les "." et les "-") dans les emails
   - Possibilit�s de mise en page basique (gras, italique, monospace)
   - Un m�mo (optionel) pour la mise en page est pr�sent sous la bo�te d'envoie
     des messages
   - Possibilit� d'ajout d'URL grace aux tags [url] (voir m�mo)
   - Sauvegarde des donn�es personnelles (nom et email) dans un cookie afin
     de ne pas avoir � le rentrer � chaque fois
   - Si l'utilisateur oublie d'entrer la fin d'un tags de mise en page (<b> par
     exemple) alors le script ajoute la fin de celui-ci � la fin du message pour
     �viter que l'int�gralit� de la page ne soit affect�e.
   - Mode permettant de geler les nouveaux messages (permet de bloquer les
     entr�es dans la base de donn�es quand, par exemple, on doit faire une
     sauvegarde ou un transfert decelle-ci.
   - Mode d'administration basique (optionnel, sous forme de module)
     Il permet la modification et la suppression des sujets et des messages.
   - Possibilit� d'utiliser une langue ayant un autre alphabet que l'alphabet
     occidental classique (arabe, asiatique, russe, grecque etc.)
   - Fonction permettant d'�viter les posts identiques � r�p�tition.



4. Copyright et contacts

   Copyright MM - Camille BOULIERE - 2003

   Site officiel du forum : http://forumoxalis.ehol.org
   En cas de probl�me vous pourrez utiliser le forum disponible sur le site-web
   ci-dessus
   Vous pouvez me contacter � l'adresse suivante : forumoxalis@ehol.org



5. Contributeur(s)

   - Dario Spagnolo <spada@no-log.org> -- Module d'administration, et fonction
     permettant d'�viter que les posts se r�p�tent (lorsqu'ils sont identiques)
     corrections de quelques probl�mes, conseils et nettoyage du code.



6. Remerciments

   La masse de fous testeurs venus de LinuxFR et qui ont d�busqu� en une soir�e
   la plupart des gros d�fauts du forum.

   Le forum de PhpScripts-FR.net : http://www.phpscripts-fr.net/forum/
   Qui fournit vraiment un tr�s bon support qui m'a aid� dans certaines parties
   du code. Bon il y a une pub et techniquement je pr�f�re le mien... mais on
   peut pas �tre parfait !

Et en particulier :

   yandal et Yves (tag [url])
   honolulu (simplification de l'ajout des tags finaux)
   Tetsuo ($_POST)

   Et � tous les autres qui ont tent� de m'aider ou bien que j'ai oubli� (si
   vous avez une raison de r�clamer votre pr�sente dans cette liste n'h�sitez
   pas � m'�crire ;o) )



7. TODO / historique

   * Pr�visions :

   0.2.0 - ?

      - Modularit�
      - Am�liorer les recherches
      - Internationnalisation (multilingue)
      - Notification par email
      - Possibilit� d'ins�rer un r�sum� des nouveaux messages
      - Prise en charge d'autres bases de donn�es
	 - Import de bases de donn�es venant d'autres forum (comme phpBB)
      - ...

   0.1.3

      - Prise en charge de la base de donn�es SQLite                :
      - Ajout de l'auteur dans la partie "derni�re r�ponse par"     :


   * Fonctionnalit�s ajout�es selon les versions / historique :

   0.1.2 - 30/11/2003

      - Correction des bugs concernant l'utilisation de code HTML
        dans les champs TITRE et NOM (de l'auteur)                  :  FAIT
      - Ajout d'une page interm�diaire permettant d'�viter que les
        personnes postent plusieurs fois leur message pour rien     :  FAIT
      - Pr�visualisation du message avant le post                   :  FAIT
      - On �vite les posts vides                                    :  FAIT
      - Module d'administration optionnel par Dario Spagnolo
        (modification/suppression de sujets)                        :  FAIT
      - Fonction permettant d'�viter qu'une personne poste plusieurs
        fois � la suite le m�me message (Dario Spagnolo)            :  FAIT
      - Nettoyage du code                                           :  commenc�

   0.1.1 - 30/10/2003

      - Utilisation des cookies pour savegarder le nom et l'email   :  FAIT
      - Correction d'un bug qui n'en  n'�tait pas un. On peut
        maintenant �crire avec des caract�res autre  que les
        occidentaux (arabes,  asiatiques etc.                       :  FAIT
      - Mode administration                                         :  FAIT

   0.1.0 - 27/10/2003
      - Affichage des sujets par pages                              :  FAIT
      - Affichage des r�ponses par page                             :  FAIT
      - Formulaire de recherches                                    :  FAIT
      - Mise en premier plan du sujet lors d'un nouveau message     :  FAIT
      - Memo pour l'envoie des messages                             :  FAIT
      - Corriger bug des <b> sans fin                               :  FAIT
      - Nom de BDD modifiable                                       :  FAIT
      - extract($HTTP_GET_VARS); OUT !                              :  FAIT
      - remplacer les "" par NULL                                   :  FAIT
      - Tronquer les titres pour �viter les d�bordements            :  FAIT



8. Notes

   - Le code n'est pas formidable, encore assez brouillon... mais
   compr�hensible, si il y a de nouvelles versions cela sera corrig�

   - Vous serez gentils de ne pas retirer le copyright...

   - Je ne suis pas l� pour vous fournir un support, utilisez le forum du site
   officiel ou RTFM (avis aux connaisseurs).

   - Ce forum a �t� ENTIEREMENT ET UNIQUEMENT d�velopp� sous Debian GNU/Linux.
   Et son auteur est tr�s fier de le dire !
