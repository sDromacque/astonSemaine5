#School
SELECT * FROM note INNER JOIN classeshavepersons ON note.idPerson = classeshavepersons.idPerson WHERE classeshavepersons.idClass = 1
