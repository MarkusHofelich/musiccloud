var filelist = [];  // Ein Array, das alle hochzuladenden Files enth�lt
var totalSize = 0; // Enth�lt die Gesamtgr��e aller hochzuladenden Dateien
var totalProgress = 0; // Enth�lt den aktuellen Gesamtfortschritt
var currentUpload = null; // Enth�lt die Datei, die aktuell hochgeladen wird
 
document.getElementById('uploadzone').addEventListener('drop', handleDropEvent, false);
 
function handleDropEvent(event)
{
    event.stopPropagation();
    event.preventDefault();
 
    // event.dataTransfer.files enth�lt eine Liste aller gedroppten Dateien
    for (var i = 0; i < event.dataTransfer.files.length; i++)
    {
        filelist.push(event.dataTransfer.files[i]);  // Hinzuf�gen der Datei zur Uploadqueue
        totalSize += event.dataTransfer.files[i].size;  // Hinzuf�gen der Dateigr��e zur Gesamtgr��e
    }
}
function startNextUpload()
{
    if (filelist.length)  // �berpr�fen, ob noch eine Datei hochzuladen ist
    {
        currentUpload = filelist.shift();  // n�chste Datei zwischenspeichern
        uploadFile(currentUpload);  // Upload starten
    }
}
 
function uploadFile(file)
{
    var xhr = new XMLHttpRequest();    // den AJAX Request anlegen
    xhr.open('POST', 'uploads.php');    // Angeben der URL und des Requesttyps
 
    var formdata = new FormData();    // Anlegen eines FormData Objekts zum Versenden unserer Datei
    formdata.append('uploadfile', file);  // Anh�ngen der Datei an das Objekt
    xhr.send(formdata);    // Absenden des Requests
	
 xhr.upload.addEventListener("progress", handleProgress);
 xhr.addEventListener("load", handleComplete);
 xhr.addEventListener("error", errorHandler);
}

function handleComplete(event)
{
    totalProgress += currentUpload.size;  // F�ge die Gr��e dem Gesamtfortschritt hinzu
    startNextUpload(); // Starte den Upload der n�chsten Datei
}

function handleError(event)
{
    alert("Upload failed");    // Die Fehlerbehandlung kann nat�rlich auch anders aussehen
    totalProgress += currentUpload.size;  // Die Datei wird dem Progress trotzdem hinzugef�gt, damit die Prozentzahl stimmt
    startNextUpload();  // Starte den Upload der n�chsten Datei
}

function handleProgress(event)
{
    var progress = totalProgress + event.loaded;  // F�ge den Fortschritt des aktuellen Uploads tempor�r dem gesamten hinzu
    document.getElementById('progress').innerHTML = 'Aktueller Fortschritt: ' + (progress / totalSize) + '%';
}

function handleComplete(event)
{
    totalProgress += currentUpload.size;  // F�ge die Gr��e dem Gesamtfortschritt hinzu
    startNextUpload(); // Starte den Upload der n�chsten Datei
}
 
function handleError(event)
{
    alert("Upload failed");    // Die Fehlerbehandlung kann nat�rlich auch anders aussehen
    totalProgress += currentUpload.size;  // Die Datei wird dem Progress trotzdem hinzugef�gt, damit die Prozentzahl stimmt
    startNextUpload();  // Starte den Upload der n�chsten Datei
}
 
function handleProgress(event)
{
    var progress = totalProgress + event.loaded;  // F�ge den Fortschritt des aktuellen Uploads tempor�r dem gesamten hinzu
    document.getElementById('progress').innerHTML = 'Aktueller Fortschritt: ' + (progress / totalSize) + '%';
}