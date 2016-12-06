def sortirovka(q):
	sort = sorted(q)
	otvet = ""
	for char in sort:
		otvet = otvet + str(char)
	print ("vashe shiclo: " + otvet)
a = raw_input("vvedite shiclo: ")
sortirovka(a)