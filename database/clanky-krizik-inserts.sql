insert into kategorie (nazev) values
("IT"),
("Elektro"),
("Programovani"),
("Databaze");

show columns from autor;

insert into autor (jmeno, prijmeni) values
("Pepa","Vomáčka"),
("František","Novotný"),
("Jarmila","Moudrá"),
("Anička","Nejedlá"),
("Kryštof","Pohádka");

show columns from clanky;
select idkategorie from kategorie;
select idautor from autor;

insert into clanky (titulek,obsah,idkategorie,idautor) values
("Připojení k databázi"," Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam eget nisl. Fusce consectetuer risus a nunc. Nullam dapibus fermentum ipsum. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. In laoreet, magna id viverra tincidunt, sem odio bibendum justo, vel imperdiet sapien wisi sed libero. Maecenas lorem. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Maecenas lorem. Suspendisse nisl. Duis risus. Et harum quidem rerum facilis est et expedita distinctio. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nullam at arcu a est sollicitudin euismod. Etiam dictum tincidunt diam. Aenean vel massa quis mauris vehicula lacinia. Nulla non lectus sed nisl molestie malesuada. In convallis. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. ",1,4),
("Jak projít k maturitě"," Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer pellentesque quam vel velit. Aliquam ornare wisi eu metus. Maecenas sollicitudin. Nullam sapien sem, ornare ac, nonummy non, lobortis a enim. Curabitur bibendum justo non orci. Integer pellentesque quam vel velit. Suspendisse sagittis ultrices augue. Mauris tincidunt sem sed arcu. Nulla non lectus sed nisl molestie malesuada. Duis ante orci, molestie vitae vehicula venenatis, tincidunt ac pede. Phasellus rhoncus. Nulla quis diam. ",3,5),
("Úspěšný život po maturitě"," Etiam sapien elit, consequat eget, tristique non, venenatis quis, ante. Proin pede metus, vulputate nec, fermentum fringilla, vehicula vitae, justo. In sem justo, commodo ut, suscipit at, pharetra vitae, orci. Morbi imperdiet, mauris ac auctor dictum, nisl ligula egestas nulla, et sollicitudin sem purus in lacus. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Nullam dapibus fermentum ipsum. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Aliquam ornare wisi eu metus. Nunc dapibus tortor vel mi dapibus sollicitudin. Donec iaculis gravida nulla. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Mauris tincidunt sem sed arcu. Integer tempor. ",4,3),
("Cesta na pracák"," Quisque porta. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Duis viverra diam non justo. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis risus. Proin mattis lacinia justo. Integer malesuada. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Curabitur vitae diam non enim vestibulum interdum. Aliquam erat volutpat. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Integer pellentesque quam vel velit. Pellentesque sapien. Integer in sapien. Pellentesque sapien. Fusce suscipit libero eget elit. Duis risus. ",2,2),
("Jak se odborně vzdělávat"," Quisque porta. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante. Duis viverra diam non justo. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Duis risus. Proin mattis lacinia justo. Integer malesuada. Cras pede libero, dapibus nec, pretium sit amet, tempor quis. Curabitur vitae diam non enim vestibulum interdum. Aliquam erat volutpat. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Integer pellentesque quam vel velit. Pellentesque sapien. Integer in sapien. Pellentesque sapien. Fusce suscipit libero eget elit. Duis risus. ",1,2);