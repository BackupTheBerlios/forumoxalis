                 README.TXT - Forum Oxalis v0.1.1 - 30/10/2003
--------------------------------------------------------------------------------
Ce programme est libre, vous pouvez le copier, le redistribuer et/ou le modifier
sous les termes de la GNU General Public Licence disponible à l'adresse :
http://www.gnu.org/licenses/gpl.html ou bien directement dans le fichier
LICENCE.txt
--------------------------------------------------------------------------------

Pour l'installation, voyez le fichier INSTALL.txt
Pour les instructions d'utilisation ainsi que la configuration voyez USAGE.txt

   Sommaire

   1. Définition
     a Description rapide
     b Description des fichiers présents dans l'archive
   2. Nécessités
   3. Fonctionnalités
     a Externe
     b Interne
   4. Copyright et contact
   5. Remerciements
   6. TODO / Historique
   7. Notes


1. Définition

 a Description rapide
 
   "Forum Oxalis" est un forum léger destiné à être simple à configurer et à
   utiliser... en opposition aux usines à gaz de type phpBB et similaires.
   Il a été créé initialement pour http://oxalis.ehol.org ainsi que pour son
   hébergeur : ehol.org.

   Le but étant de combler un vide, trouvez-moi un forum comprenant toutes les
   fonctionnalités placées dans la partie 3... tout en étant aussi léger !

 b Description des fichiers présents dans l'archive
 
   Vous devez avoir téléchargé un fichier de type : ForumOxalis-x.x.x.tgz
   
   * Décompression, si vous êtes sous un Unix :
     tar -zxvf fichier.tgz
       ou
     gunzip fichier.tgz && tar -xf fichier.tgz
       ou encore
     gunzip < fichier.tgz | tar xvf -
   
     Si vous êtes sous un autre système, la même manip est possible grace à :
     http://www.gzip.org/index-f.html
   
     Mais vous pourrez aussi vous rendre ici et prendre un programme capable de 
     le faire :
     http://www.framasoft.net/rubrique214.html   

   * Fichiers présents après la décompression
   
     ForumOxalis-x.x.x/
        Répertoire racine, vous pouvez le renommer comme bon vous semble
   
     ForumOxalis-x.x.x/doc
        Répertoire contenant la documentation (il peut être retiré pour 
        l'utilisation mais le fichier LICENCE.txt doit rester en cas de 
        diffusion)
        
     ForumOxalis-x.x.x/doc/LICENCE.txt
        Licence du programme.
   
     ForumOxalis-x.x.x/doc/creertable.php
        Fichier de création de la table (lisez d'abord le INSTALL.txt).
   
     ForumOxalis-x.x.x/doc/README.txt
        Le fichier que vous êtes en train de lire.
   
     ForumOxalis-x.x.x/doc/forumoxalis.tbl
        Fichier permettant de créer la table sans utiliser de script (optionel).
   
     ForumOxalis-x.x.x/doc/INSTALL.txt
        Fichier décrivant l'installation.
        
     ForumOxalis-x.x.x/doc/USAGE.txt
        Instructions d'utilisation et de configuration du forum.
      
     ForumOxalis-x.x.x/func.php
        Fichier interne, toutes les fonctions.
      
     ForumOxalis-x.x.x/index.php
        Fichier pouvant être retiré, il permet de créer le cookie et insère le 
        fichier "forum.php" (lisez USAGE.txt).
        
     ForumOxalis-x.x.x/forum.php
        Le forum, fichier à inclure dans votre site en cas d'intégration.
        
     ForumOxalis-x.x.x/layout.css
        Fichier décrivant l'aspet du forum.
        Spécifications : http://www.yoyodesign.org/doc/w3c/css2/cover.html
        
     ForumOxalis-x.x.x/vars.php
        Fichier contenant les variables de configuration et de personnalisation 
        (techniques) du forum.



2. Nécessités

   - Hébergement web
   - Une base de données MySQL
   - PHP > 4.0 (vous pouvez essayer avec php3 mais je ne l'ai jamais fait)
   - Un cerveau (et un navigateur)



3. Fonctionnalités

 a Externe
   - Libre (sous licence GPL : http://www.gnu.org/licenses/gpl.html)
   - Conforme aux normes du W3C (http://www.w3c.org)
   - Léger (< 20ko)
   - Pas de superflu
   - Conforme à la séparation : données/interface
   - Facilement configurable visuellement grace aux CSS
   - Facilement insérable dans une page HTML
 b Interne
   - Affichage des résultats par page et selon un nombre définit dans vars.php
   - Possibilité de faire des recherches dans les résultats
   - Mise en premier plan du sujet en cas de nouvel enregistrement
   - Affichage de la liste des sujets avec la date du dernier message
   - Mesures para-spam (remplace les "@", les "." et les "-") dans les emails
   - Possibilités de mise en page basique (gras, italique, monospace)
   - Un mémo (optionel) pour la mise en page est présent sous la boîte d'envoie
     des messages
   - Possibilité d'ajout d'URL grace aux tags [url] (voir mémo)
   - Sauvegarde des données personnelles (nom et email) dans un cookie afin
     de ne pas avoir à le rentrer à chaque fois
   - Si l'utilisateur oublie d'entrer la fin d'un tags de mise en page (<b> par
     exemple) alors le script ajoute la fin de celui-ci à la fin du message pour
     éviter que l'intégralité de la page
   - Mode d'administration (permet debloquer les entrées dans la base de
     données quand,par exemple, on doit faire unesauvegarde ou un
     transfert decelle-ci.
   - Pas de zone d'administration, celle-ci se fait via un logiciel de gestion
     de base de données tel que phpMyAdmin
   - Possibilité d'utiliser une langue non occidentale (arabe, asiatique...)



4. Copyright et contacts

   Copyright MM - Camille BOULIERE - 2003

   Site officiel du forum : http://forumoxalis.ehol.org
   En cas de problème vous pourrez utiliser le forum disponible sur le site-web
   ci-dessus
   Vous pouvez me contacter à l'adresse suivante : forumoxalis@ehol.org



5. Remerciments

   Le forum de PhpScripts-FR.net : http://www.phpscripts-fr.net/forum/
   Qui fournit vraiment un très bon support qui m'a aidé dans certaines parties
   du code. Bon il y a une pub et techniquement je préfère le mien... mais on 
   peut pas être parfait !

Et en particulier :

   yandal et Yves (tag [url])
   honolulu (simplification de l'ajout des tags finaux)
   Tetsuo ($_POST)

   Et à tous les autres qui ont tenté de m'aider ou bien que j'ai oublié (si 
   vous avez une raison de réclamer votre présente dans cette liste n'hésitez 
   pas à m'écrire ;o) )



6. TODO / historique

   TODO / Dans la prochaine version (si elle existe un jour) :

   0.2.0 - ?

      - Modularité
      - Améliorer les recherches
      - Internationnalisation (multilingue)
      - Notification par email
      - Possibilité d'insérer un résumé des nouveaux messages
      - ...

   Fonctionnalités ajoutées selon les versions / historique :

   0.1.1 - 30/10/2003

      - Utilisation des cookies pour savegarder le nom et l'email   :  FAIT
      - Correction d'un bug qui n'en  n'était pas un. On peut
        maintenant écrire avec des caractères autre  que les 
        occidentaux (arabes,  asiatiques etc.                       :  FAIT
      - Mode administration                                         :  FAIT
      
      
   0.1.0 - 27/10/2003
      - Affichage des sujets par pages                              :  FAIT
      - Affichage des réponses par page                             :  FAIT
      - Formulaire de recherches                                    :  FAIT
      - Mise en premier plan du sujet lors d'un nouveau message     :  FAIT
      - Memo pour l'envoie des messages                             :  FAIT
      - Corriger bug des <b> sans fin                               :  FAIT
      - Nom de BDD modifiable                                       :  FAIT
      - extract($HTTP_GET_VARS); OUT !                              :  FAIT
      - remplacer les "" par NULL                                   :  FAIT
      - Tronquer les titres pour éviter les débordements            :  FAIT



7. Notes

   - Le code n'est pas formidable, encore assez brouillon... mais 
   compréhensible, si il y a de nouvelles versions cela sera corrigé

   - Vous serez gentils de ne pas retirer le copyright...

   - Je ne suis pas là pour vous fournir un support, utilisez le forum du site
   officiel ou RTFM (avis aux connaisseurs).

   - Ce forum a été ENTIEREMENT ET UNIQUEMENT développé sous Debian GNU/Linux. 
   Et son auteur est très fier de le dire !
