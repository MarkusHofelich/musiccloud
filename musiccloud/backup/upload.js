var filelist = [];  // Ein Array, das alle hochzuladenden Files enthält
var totalSize = 0; // Enthält die Gesamtgröße aller hochzuladenden Dateien
var totalProgress = 0; // Enthält den aktuellen Gesamtfortschritt
var currentUpload = null; // Enthält die Datei, die aktuell hochgeladen wird
 
document.getElementById('uploadzone').addEventListener('drop', handleDropEvent, false);
 
function handleDropEvent(event)
{
    event.stopPropagation();
    event.preventDefault();
 
    // event.dataTransfer.files enthält eine Liste aller gedroppten Dateien
    for (var i = 0; i < event.dataTransfer.files.length; i++)
    {
        filelist.push(event.dataTransfer.files[i]);  // Hinzufügen der Datei zur Uploadqueue
        totalSize += event.dataTransfer.files[i].size;  // Hinzufügen der Dateigröße zur Gesamtgröße
    }
}
function startNextUpload()
{
    if (filelist.length)  // Überprüfen, ob noch eine Datei hochzuladen ist
    {
        currentUpload = filelist.shift();  // nächste Datei zwischenspeichern
        uploadFile(currentUpload);  // Upload starten
    }
}
 
function uploadFile(file)
{
    var xhr = new XMLHttpRequest();    // den AJAX Request anlegen
    xhr.open('POST', 'uploads.php');    // Angeben der URL und des Requesttyps
 
    var formdata = new FormData();    // Anlegen eines FormData Objekts zum Versenden unserer Datei
    formdata.append('uploadfile', file);  // Anhängen der Datei an das Objekt
    xhr.send(formdata);    // Absenden des Requests
	
 xhr.upload.addEventListener("progress", handleProgress);
 xhr.addEventListener("load", handleComplete);
 xhr.addEventListener("error", errorHandler);
}

function handleComplete(event)
{
    totalProgress += currentUpload.size;  // Füge die Größe dem Gesamtfortschritt hinzu
    startNextUpload(); // Starte den Upload der nächsten Datei
}

function handleError(event)
{
    alert("Upload failed");    // Die Fehlerbehandlung kann natürlich auch anders aussehen
    totalProgress += currentUpload.size;  // Die Datei wird dem Progress trotzdem hinzugefügt, damit die Prozentzahl stimmt
    startNextUpload();  // Starte den Upload der nächsten Datei
}

function handleProgress(event)
{
    var progress = totalProgress + event.loaded;  // Füge den Fortschritt des aktuellen Uploads temporär dem gesamten hinzu
    document.getElementById('progress').innerHTML = 'Aktueller Fortschritt: ' + (progress / totalSize) + '%';
}

function handleComplete(event)
{
    totalProgress += currentUpload.size;  // Füge die Größe dem Gesamtfortschritt hinzu
    startNextUpload(); // Starte den Upload der nächsten Datei
}
 
function handleError(event)
{
    alert("Upload failed");    // Die Fehlerbehandlung kann natürlich auch anders aussehen
    totalProgress += currentUpload.size;  // Die Datei wird dem Progress trotzdem hinzugefügt, damit die Prozentzahl stimmt
    startNextUpload();  // Starte den Upload der nächsten Datei
}
 
function handleProgress(event)
{
    var progress = totalProgress + event.loaded;  // Füge den Fortschritt des aktuellen Uploads temporär dem gesamten hinzu
    document.getElementById('progress').innerHTML = 'Aktueller Fortschritt: ' + (progress / totalSize) + '%';
}