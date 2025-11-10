<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import HelpButton from '@/Components/HelpButton.vue';
import CookieBanner from '@/Components/CookieBanner.vue';

const darkMode = ref(false);

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    if (darkMode.value) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('darkMode', 'true');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('darkMode', 'false');
    }
};

if (localStorage.getItem('darkMode') === 'true') {
    darkMode.value = true;
    document.documentElement.classList.add('dark');
}

const helpSteps = [
    {
        title: 'Allgemeine Geschäftsbedingungen (AGBs)',
        description: 'Die AGBs regeln die Nutzung unserer Website und den Kauf von Tickets. Hier finden Sie alle wichtigen Bedingungen und Regeln.',
        tips: 'Bitte lesen Sie die AGBs sorgfältig durch, bevor Sie Tickets kaufen.'
    },
    {
        title: 'Vertragsabschluss',
        description: 'In den AGBs wird erklärt, wie ein Vertrag zwischen Ihnen und uns zustande kommt, wenn Sie ein Ticket kaufen.',
        tips: 'Mit dem Kauf eines Tickets akzeptieren Sie automatisch unsere AGBs.'
    },
    {
        title: 'Zahlungsbedingungen',
        description: 'Hier finden Sie Informationen zu den akzeptierten Zahlungsmethoden und wann die Zahlung fällig wird.',
        tips: 'Tickets werden erst nach erfolgreicher Zahlung versendet.'
    },
    {
        title: 'Stornierung und Rückerstattung',
        description: 'Die AGBs enthalten wichtige Informationen darüber, ob und unter welchen Bedingungen Sie Tickets stornieren können und eine Rückerstattung erhalten.',
        tips: 'Lesen Sie diese Bedingungen vor dem Kauf, um Missverständnisse zu vermeiden.'
    }
];
</script>

<template>
    <div :class="darkMode ? 'dark' : ''" class="min-h-screen transition-colors duration-300">
        <Head title="AGBs" />

        <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">
            
            <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-sm border-b border-gray-200 dark:border-gray-700 transition-colors duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-center items-center h-20">
                        <Link href="/">
                            <img src="/tix4me.svg" alt="Tix4me Logo" class="h-12 w-auto">
                        </Link>
                    </div>
                </div>
            </nav>

            
            <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-2xl shadow-xl p-8 sm:p-12 border border-gray-200 dark:border-gray-700">
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-8">Allgemeine Geschäftsbedingungen (AGBs)</h1>

                    <div class="prose prose-gray dark:prose-invert max-w-none">
                                                <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§1 Geltung der Bedingungen</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Die 4me GmbH ist Betreiberin der Website www.tix4me.ch und nicht selbst Veranstalter der angebotenen Veranstaltungen, sondern fungiert als Agentin von mehreren Veranstaltern. Vertragliche Beziehungen bezüglich der Veranstaltungen bestehen ausschliesslich zwischen dem/der Ticketkäufer:in und dem jeweiligen Veranstalter. Diese vertragliche Beziehungen erfolgen ausschliesslich aufgrund dieser Geschäftsbedingungen, auch wenn sie nicht nochmals ausdrücklich vereinbart werden. Mit Bestellung der Tickets gelten diese Bedingungen als angenommen. Allgemeinen Einkaufsbedingungen des Käufers wird hiermit widersprochen. Abweichungen von diesen Geschäftsbedingungen sind nur wirksam, wenn wir sie schriftlich bestätigen. Überschreitet ein Käufer durch eine Bestellung sein Kreditlimit, so sind wir von unserer Lieferverpflichtung entbunden. 4me GmbH hält sich an Alterseinschränkungen jeglicher Produkte und Dienstleistungen. Wir behalten uns das Recht vor, Altersprüfungen vorzunehmen.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Mit der Bestellung von Tickets beauftragt der/die Ticketkäufer:in 4me GmbH, respektive die Website www.tix4me.ch mit der Abwicklung des Kartenkaufes sowie deren Zustellung.
                            </p>
                        </section>

                                                <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§2 Haftungsausschluss</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Für Vermögens-, Personen- und Sachschäden im Zusammenhang mit Organisation und Durchführung von Veranstaltungen übernimmt die 4me GmbH keine Haftung. 4me GmbH schliesst insbesondere jegliche Haftung aufgrund von Absagen und Verschiebungen von Veranstaltungen oder wegen deren fehlerhafter Organisation und Durchführung aus.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Für die Richtigkeit der durch die 4me GmbH (z.B. auf ihrer Internet-Seite und in anderen Publikationsmedien) verbreiteten Informationen wird keine Gewähr geleistet. Insbesondere garantiert 4me GmbH weder für die Korrektheit noch für die Vollständigkeit der Informationen. 4me GmbH haftet nicht für Schäden, welche infolge Nutzung der 4me GmbH-Internetseite und tix4me-Internetseite durch Störung, Unterbrüche und Überlastungen des EDV-Systems des Benutzers entstanden sind. Desgleichen haftet 4me GmbH nicht für Schäden aus Übermittlungsfehlern oder aus anderen Mängeln.
                            </p>
                        </section>

                                                <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§3 Vorschriften des Veranstalters/Gültigkeit der Tickets</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Den Vorschriften des Veranstalters, welche bei diesem auf Anfrage erhältlich sind, ist Folge zu leisten. Der/die Ticketkäufer:in anerkennt diese Vorschriften ausdrücklich, insbesondere bezüglich der darin enthaltenen Sicherheitsauflagen, Alters- und weiteren Zutrittsbeschränkungen sowie etwaiger anderer Vorschriften. Jeglicher Missbrauch der Tickets ist untersagt. Den Anweisungen des Veranstaltungspersonals ist Folge zu leisten. Bei Zuwiderhandlung droht der Ausschluss von der Veranstaltung.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Tickets sind nur gültig, sofern sie über einen offiziellen Vertriebskanal der 4me GmbH bezogen und vollständig bezahlt worden sind. Der/die Ticketkäufer:in muss selber sicherstellen, dass sein/ihr Selfprint-Ticket vor Missbrauch (z.B. widerrechtliches Kopieren, Verändern oder Ausdrucken durch Unberechtigte) geschützt ist. Tickets sind vor Feuchtigkeit, Schmutz, Beschädigung sowie mechanischen oder optischen Einwirkungen etc. zu schützen. Der Barcode muss maschinenlesbar sein.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Ebenfalls muss der/die Ticketkäufer:in selbst sicherstellen, dass seine/ihre Tickets bei Eventdurchführung bezahlt ist/sind. Zu beachten sind hier insbesondere die Verarbeitungsfristen der einzelnen Zahlungsmittel.
                            </p>
                        </section>

                                                <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§4 Erhebung, Verarbeitung und Verwendung von Daten</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Die Datenschutzerklärung ist integraler und bindender Teil dieser AGB.
                                4me GmbH erhebt, verarbeitet, nutzt und speichert Personendaten, sofern dies zur Erbringung von Dienstleistungen, zur Zustellung von Marketinginformationen und zum Ticketvertrieb notwendig sind.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Personendaten wie Email Adresse, Name und Vorname, Adresse sowie Geburtsdatum, welche beim Bestell-, Anmeldungs- oder Akkreditierungsprozess angegeben werden, werden dem jeweiligen Veranstalter, bei dem ein Ticket gekauft oder bei dem sich angemeldet bzw. akkreditiert wurde, zwecks Vertragserfüllung, Zustellung weiterführender Veranstaltungsinformationen und Einlasskontrolle zur Verfügung gestellt.
                            </p>
                        </section>

                                                <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§5 Rückgabe und Umtausch der Tickets</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Rückgabe oder Umtausch der Tickets ist generell ausgeschlossen. Bei Verschiebungen von Veranstaltungen sind die Tickets automatisch für das Verschiebungsdatum gültig. Wird eine Veranstaltung abgesagt, so können die Tickets innerhalb von 30 Tagen ab Bekanntgabe der Absage durch die Website www.tix4me.ch zum Nennwert zurückgegeben werden. Der Rückforderungsanspruch des/der Ticketkäufer:in richtet sich ausschliesslich gegen den Veranstalter (Vertragspartner) und ist grundsätzlich bei diesem geltend zu machen. Die 4me GmbH ist indessen berechtigt aber nicht verpflichtet, noch nicht an den Veranstalter weitergeleitete und/oder von diesem zurückvergütete Beträge namens des Veranstalters dem/der Ticketkäufer:in zurückzuerstatten. Rücknahme der Tickets und Rückzahlung der Ticketkosten erfolgen gegebenenfalls durch diejenige Kaufstelle, die das Ticket ausgegeben hat.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Über Internet bezogene und mit elektronischen Zahlungsmitteln (Kreditkarte, PayPal, Postcard etc.) bezahlte Tickets müssen nicht zurückgegeben werden. Der abgebuchte Nennwert wird, soweit die obgenannten Voraussetzungen erfüllt sind, automatisch dem elektronischen Zahlungsmittel des/der Ticketkäufers:in wieder gutgeschrieben.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                In allen anderen Fällen sowie nach Ablauf der Frist von 30 Tagen kann die Rückgabe nur noch beim Veranstalter gemäss dessen Rücknahme-Vorschriften erfolgen.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Bei Abschluss einer Ticketversicherung gelten die allgemeinen Versicherungsbedingungen (AVB) der EUROPÄISCHE Reiseversicherungs AG.
                            </p>
                        </section>

                                                <section class="mb-8">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§6 Schlussbestimmungen</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">
                                Abweichungen von den vorliegenden Allgemeinen Geschäftsbedingungen sind nur wirksam, wenn sie schriftlich vereinbart werden. Mit der Bestellung von Tickets anerkennt der/die Ticketkäufer:in die obenstehenden allgemeinen Geschäftsbedingungen. 4me GmbH behält sich vor, diese Allgemeinen Geschäftsbedingungen jederzeit ohne Angabe von Gründen zu ändern. Für bereits aufgegebene Bestellungen gelten solche Änderungen nicht. Sollten einzelne Punkte dieser Allgemeinen Geschäftsbedingungen unwirksam sein oder werden, so wird hierdurch die Gültigkeit des Vertrages im Übrigen nicht berührt.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300">
                                Auf das gesamte Vertragsverhältnis zwischen dem Veranstalter (und der 4me GmbH) einerseits und dem/der Ticketkäufer:in andererseits ist materielles Schweizer Recht anwendbar.
                            </p>
                        </section>

                                                <div class="mt-12 pt-8 border-t-2 border-gray-300 dark:border-gray-600">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Für den Auftraggeber / Veranstalter</h2>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§1 Integrierender Bestandteil AGB gegenüber Ticketkäufer:innen</h3>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Die Allgemeinen Geschäftsbedingungen (AGB) mit Ticketkäuferinnen und Ticketkäufern (siehe oben) bilden integrierenden Bestandteil dieser AGB für Auftraggeber bzw. Veranstalter.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§2 Haftungsausschluss gegenüber Veranstaltern</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Die Services der 4me GmbH über die Website www.tix4me.ch werden ausdrücklich ohne Mängelgewähr und ohne Verfügbarkeitsgewährleistung bereitgestellt. Die 4me GmbH haftet somit gegenüber Veranstaltern, Agenturen oder anderen Anspruchsgruppen nicht für Mehraufwand, Schäden und Folgeschäden, welche durch die Nutzung der 4me GmbH-Plattform, respektive tix4me-Plattform und anderen 4me GmbH-Softwarelösungen entstanden sind. Insbesondere haftet 4me GmbH nicht für Schäden oder Mehraufwand, welche infolge von Störungen und Unterbrüchen der Plattform und anderer Softwarelösungen oder aus Übermittlungsfehlern entstehen.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Die Kontrollpflicht betreffend Einstellungen und Angaben im 4me GmbH-System respektive tix4me-System, insbesondere von Datum, Ticketpreisen, Kontingenten und anderen Veranstaltungsdaten liegt ohne Ausnahme bei den zuständigen Veranstaltern, bzw. bei den zuständigen Auftraggebern Agenturen. Für die Richtigkeit der durch die 4me GmbH (z.B. auf ihrer Internet-Seite und in anderen Publikationsmedien) verbreiteten Informationen wird keine Gewähr geleistet. Insbesondere garantiert 4me GmbH weder für die Korrektheit noch für die Vollständigkeit der Informationen.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    In jedem Fall, und besonders bei für den Auftraggeber eigens erstellten Softwarelösungen und programmierten Zusatzfunktionen, ist der Auftraggeber verpflichtet, die Funktionalität des Systems und Richtigkeit der Angaben umgehend zu kontrollieren und die 4me GmbH gegebenenfalls umgehend über vorliegende Mängel oder Fehler zu informieren.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§3 Verschiebung und Ausfall von Veranstaltungen</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Wird eine Veranstaltung verschoben, sind die Tickets automatisch für die Ersatzveranstaltung gültig.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Eine Ersatzveranstaltung muss hierbei kumulativ die folgenden Kriterien erfüllen: 1. Gleiche oder gleichwertige Künstler, 2. Gleiche oder gleichwertige Location, 3. Gleich- oder höherpreisige Ticketkategorien.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Hierbei gelten folgende Fristen: Fällt eine Veranstaltung nicht aufgrund von «höherer Gewalt» aus, ist die Ersatzveranstaltung im 4me GmbH-System, respektive tix4me-System innerhalb von 60 Tagen nach Bekanntgabe der Verschiebung aufzuschalten. Die Durchführung der Ersatzveranstaltung muss zudem innerhalb von 90 Tagen nach geplantem Datum der verschobenen Veranstaltung erfolgen.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Fällt eine Veranstaltung aufgrund von «höherer Gewalt» aus, gelten verlängerte Fristen. In diesem Fall muss die Ersatzveranstaltung innerhalb von 180 Tagen nach Bekanntgabe der Eventverschiebung im 4me GmbH-System aufgeschaltet werden und die Durchführung der Ersatzveranstaltung muss innerhalb von 360 Tagen nach geplantem Datum der verschobenen Veranstaltung erfolgen.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Fällt eine Veranstaltung ohne Ersatztermin aus, hat der Auftraggeber dem/der Ticketkäufer:in die Ticketkosten vollständig zurückzuerstatten. 4me GmbH als Auftragnehmerin (Agentin) ist berechtigt aber nicht verpflichtet, die Tickets zu stornieren und dem/der Ticketkäufer:in die Ticketkosten zurückzuerstatten. Diese Transaktionen verursachen bei den Zahlungsprovidern und Vorverkaufsstellen Kosten. Die Stornogebühr für den Auftraggeber beträgt in diesem Fall 5% des Ticketpreises mindestens aber CHF 2.00 (Ticketpreis < CHF 100.00) bzw. CHF 5.00 (Ticketpreis > CHF 100.00) pro Ticket.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Die 4me GmbH wird eine solche Rückabwicklung nur übernehmen, sofern die erhaltenen Beträge noch nicht an den Auftraggeber weitergeleitet oder von diesem wieder zurückerstattet wurden.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§4 Haftung für korrekte und sichere Durchführung der Veranstaltung</h3>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Der Auftraggeber haftet für eine gesetzeskonforme und sichere Durchführung seiner Veranstaltung. Der Auftraggeber erlässt wo nötig spezielle Vorschriften für die Durchführung seiner Veranstaltung und macht diese dem Publikum zugänglich. Bei Verschiebung und Ausfall einer Veranstaltung haftet der Auftraggeber für die frühzeitige und korrekte Kommunikation gegenüber dem Auftragnehmer und gegenüber den Ticketkäufer:innen. Der Auftraggeber haftet gegenüber dem Auftragnehmer für alle im Zusammenhang mit einer fehlerhaften Organisation oder Durchführung und für alle im Zusammenhang mit einer Veranstaltungsverschiebung oder einem Veranstaltungsausfall anfallenden Kosten und Schäden, worunter auch aus Sicht des Auftragnehmers notwendige juristische Schritte und kommunikative Aktivitäten wie z.B. die öffentliche Absage der Veranstaltung fallen.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§5 Zahlungsabwicklung</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Der Auftraggeber räumt dem Auftragnehmer das Recht ein, seine Leistungen direkt mit den dem Auftraggeber zustehenden Ticket-Einnahmen zu verrechnen und den Netto-Betrag an den Auftraggeber weiterzuleiten. Die Ausbezahlung der bar und über Rechnung bezahlten Tickets an den Auftraggeber erfolgt bis spätestens 12 Wochen nach Durchführung der Veranstaltung. Die Auszahlung der über Kreditkarte bezahlten Tickets an den Auftraggeber erfolgt bis spätestens 12 Wochen nach Vergütung durch sämtliche Kreditkarten-Institute. Für die Dienstleistungen werden marktübliche 8-15 % verrechnet.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Die Auszahlung sämtlicher Ticket-Einnahmen – unabhängig davon, ob sie bar, per Rechnung oder per Kreditkarte bezahlt wurden – erfolgt spätestens innerhalb von 12 Wochen nach dem jeweiligen Veranstaltungstermin.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Es kann zu Teilzahlungen kommen, bis sämtliche Zahlungseingänge verbucht und eine bereinigte Schlussabrechnung erstellt werden kann. Eine bereinigte Schlussabrechnung ist erst möglich, wenn alle Zahlungen eingegangen und offene Buchungen geklärt sind.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Sämtliche Preise verstehen sich exklusive der gesetzlichen Mehrwertsteuer (derzeit 8,1 %).
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Die 4me GmbH behält sich das Recht vor, bei wiederkehrenden Veranstaltungen auch bereits vor Durchführung einzelner oder aller Veranstaltungen eine (Teil-)Auszahlung an den Veranstalter vorzunehmen.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§6 Mahnwesen</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Bei Nicht-Bezahlen der Rechnung stellt die 4me GmbH dem/der Ticketkäufer:in eine 1., 2. und 3. Mahnung (mit Betreibungs- oder Inkassoandrohung) zu.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Für noch unbezahlte Tickets am Event ist der Auftraggeber verantwortlich. Der Auftraggeber hat die Möglichkeit auf www.tix4me.ch eine Liste aller unbezahlten Tickets auszudrucken. Beim elektronischen Scanning werden unbezahlte Tickets zudem angezeigt. 4me GmbH empfiehlt dem Veranstalter, den Kaufpreis für unbezahlte Tickets direkt am Event einzuziehen oder vorab die Tickets zu stornieren oder durch die Website www.tix4me.ch stornieren zu lassen, damit diese am Event nicht mehr gültig sind.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Zieht der Veranstalter die noch unbezahlten Beträge direkt an Event ein, muss er dies der 4me GmbH melden, damit die betroffenen Ticketkäufer:innen nicht angemahnt werden.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Dem Veranstalter ist bewusst, dass bei bestimmten Zahlungsarten (z.B. Lastschrift, Bankeinzug, PayPal oder Kreditkarte) das Risiko einer Rückbuchung durch den/die Ticketkäufer:in besteht und dass allein der Veranstalter dieses Risiko zu tragen hat. Rückbuchungen, die nach bereits erfolgter Auszahlung an den Veranstalter erfolgen, werden dem Veranstalter zuzüglich einer Rückbuchungsgebühr gemäss jeweils gültiger Preisliste in Rechnung gestellt.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§7 Rücktritt vom Vertrag und Abweichungen</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Der Vertrag gilt bis zur Durchführung und Abrechnung der jeweiligen Veranstaltung(en).
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Der Auftraggeber nimmt zur Kenntnis, dass der Auftragnehmer aus wichtigen Gründen vom Vertrag zurücktreten und den Verkauf der Tickets stoppen kann. Die bis zum Zeitpunkt des Rücktritts aufgelaufenen Leistungen des Auftragnehmers werden verrechnet. Bei Vertragsrücktritt durch den Auftraggeber aus zwingenden Gründen werden bereits aufgelaufene und pauschale Kosten zu marktüblichen bzw. mit diesem Vertrag akzeptierten Preisen in Rechnung gestellt. Erfolgt ein Vertragsrücktritt durch den Auftraggeber aus nicht zwingenden Gründen, ist der Auftraggeber verpflichtet, den Auftragnehmer schadlos zu halten. Diese Regelung beinhaltet insbesondere vertraglich vereinbarte Honorare abzüglich allfälliger Ersparnisse.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Abweichungen von den schriftlichen Verträgen zwischen 4me GmbH und den Auftraggebern sind nur wirksam, wenn sie schriftlich vereinbart werden. Sollten einzelne Punkte eines Vertrages unwirksam sein oder werden, so wird hierdurch die Gültigkeit des Vertrages im Übrigen nicht berührt. Auf das gesamte Vertragsverhältnis zwischen Auftraggeber und Auftragnehmer ist materielles Schweizer Recht anwendbar. Ausschliesslicher Gerichtsstand für alle Streitigkeiten aus oder in Zusammenhang mit dieser Vereinbarung ist Solothurn. Bei Auftraggebern mit Sitz oder Wohnsitz im Ausland behaltet sich 4me GmbH das Recht vor, wahlweise auch am Sitz des Vertragspartners Klage zu erheben.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§8 Datenschutz</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Die Datenschutzerklärung ist integraler und bindender Teil dieser AGB.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Der Auftraggeber räumt dem Auftragnehmer das Recht ein, eventbezogene Daten an Dritte zu Eventvermarktungszwecken, insbesondere zur Aufschaltung auf Eventplattformen, weiterzuleiten.
                                </p>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Der Auftraggeber verpflichtet sich, Personendaten von Ticketkäufern, Anmeldungs- oder Akkreditierungskunden, welche ihm vom Auftragsnehmer zwecks Vertragserfüllung zur Verfügung gestellt werden, nur im gesetzlich zulässigen Rahmen zu nutzen und bei einer allfälligen Speicherung die notwendigen Sicherungsmassnahmen zu ergreifen. Ebenfalls verpflichtet sich der Auftraggeber, die notwendigen Vorkehrungen zu treffen, um seine Systeme sowie seine Zugangsdaten zum 4me GmbH-System, respektive tix4me-System vor einem Zugriff durch Unbefugte zu schützen.
                                </p>
                            </section>

                                                        <section class="mb-8">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">§9 Änderung der AGB</h3>
                                <p class="text-gray-700 dark:text-gray-300">
                                    Die 4me GmbH behält sich vor, diese Allgemeinen Geschäftsbedingungen jederzeit ohne Angabe von Gründen zu ändern. Dies wird den Auftraggebern durch Publikation auf der Website kommuniziert. Widerspricht der Auftraggeber den angepassten Bestimmungen nicht innerhalb von sechs (6) Wochen, gelten diese als akzeptiert.
                                </p>
                            </section>
                        </div>
                    </div>
                </div>
            </main>

                        <footer class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-t border-gray-200 dark:border-gray-700 mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                    <div class="flex justify-center space-x-10 mb-6">
                        <Link href="/impressum" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Impressum
                        </Link>
                        <Link href="/datenschutz" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            Datenschutz
                        </Link>
                        <Link href="/agbs" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors duration-200 font-medium">
                            AGBs
                        </Link>
                    </div>
                    <div class="flex justify-center mb-6">
                        <a href="https://www.grenchen.ch" target="_blank" rel="noopener noreferrer" class="transition-transform duration-200 hover:scale-105">
                            <img src="/vongrenchenfuergrenchen.svg?v=2" alt="Von Grenchen für Grenchen" style="height: 4.5rem;" class="w-auto">
                        </a>
                    </div>
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        © {{ new Date().getFullYear() }} Tix4me. Alle Rechte vorbehalten.
                    </div>
                </div>
            </footer>
        </div>

        <HelpButton :steps="helpSteps" title="AGBs-Hilfe" />
        <CookieBanner />
    </div>
</template>

