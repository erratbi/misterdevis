import {readFileSync} from 'fs';
import {parse} from 'ini';
import {resolve} from 'path';
import express from "express";
import bodyParser from "body-parser";
import nodemailer from "nodemailer";

import cors from "cors";


const app = express();
const PORT = 9090;
const SLEEP_TIME = 1500;

app.use(bodyParser.json());
app.use(cors());

const config = parse(readFileSync(resolve(__dirname, '../../application/configs/application.ini'), 'utf-8'));

const sysEmail = `${config['production']['system.email.name']} <${config['production']['system.email.address']}>`;

const transport = nodemailer.createTransport({
	host: config['production']['resources.mail.transport.host'],
	port: config['production']['resources.mail.transport.port'],
	secure: config['production']['resources.mail.transport.secure'],
	greetingTimeout: 60000,
	auth: {
		user: config['production']['resources.mail.transport.username'],
		pass: config['production']['resources.mail.transport.password']
	}
});


const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));

const sendArtisanMail = async ({email_artisan,email2, prenom_artisan, nom_artisan}, ref) => {
	if (!email_artisan) return null;
	
	const options = {
		from: sysEmail,
		to: email_artisan,
		cc: email2,
		subject: 'Demande de Devis disponible dans votre Espace Pro',
		html: `
        <div style="width: 650px; margin: 10px auto;">
            <div style="text-align: center; padding: 10px;"><img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" /></div>
            <h1 style="background-color:#0184c2;padding: 50px;color:#fff;text-align: center; font-size: 20px">Nouvelle demande de devis disponible dans votre Espace Pro</h1>
            <p>Bonjour ${prenom_artisan} ${nom_artisan},</p>
            <p>Nous vous informons qu'une nouvelle demande de devis est maintenant disponible dans votre Espace PRO.</p>
            <h1 style="font-size: 24px">Demande N°: ${ref}</h1>
            <p><a href="http://pro.mister-devis.com">Espace Pro</a></p>
            <p>Ce Chantier vient d'être vérifié et qualifié avec succès par notre équipe commerciale et nous vous invitons à le consulter dans les meilleurs délais.</p>
            <p>Nous vous rappelons que votre réussite dépendra essentiellement de votre capacité à prendre contact avec le demandeur dans les heures qui suivent ce message.</p>
            <p>Afin de faciliter une prise de rendez-vous rapide, nous avons informé le demandeur de votre intérêt pour son projet en lui indiquant toutes vos coordonnées actuellement disponibles.</p>
            <p>L'ensemble de l'équipe de <a href="http://mister-devis.com">www.mister-devis.com</a> vous remercie pour votre confiance</p>
            <p>Cordialement</p>
						
						<p style="margin-top: 50px">
							<strong>Georges KAPPLAN</strong><br><br>
							<span>
								Directeur Commercial<br> <a href="mailto:georges.kapplan@mister-devis.com">georges.kapplan@mister-devis.com</a><br> 09 88 77 27 00 </span>    <br><br>
							<img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" style="width: 80px" />
						</p>
        </div>
        `
	};
	transport.sendMail(options, err => {
		if (err) throw err;
	});
};

const sendParticulierMailNew = async ({email_particulier, nom_particulier, prenom_particulier}, ref) => {
	if (!email_particulier) return null;
	
	const options = {
		from: sysEmail,
		to: email_particulier,
		subject: 'Confirmation de votre demande de devis',
		html: `
				<div style="width: 650px; margin: 10px auto;">
					<div style="text-align: center; padding: 10px;"><img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" /></div>
					<h1 style="background-color:#0184c2;padding: 50px;color:#fff;text-align: center; font-size:20px ">Confirmation de votre demande de devis</h1>
					<p>Bonjour ${prenom_particulier} ${nom_particulier},</p>
					<p>Nous vous confirmons la bonne réception de votre demande de devis.</p>
					<p>Le plus rapidement possible, un de nos conseillers vous contactera afin de vérifier et valider l'ensemble des informations concernant votre projet.</p>
					<h1 style="font-size: 24px">Demande de devis N°: ${ref}</h1>
					<p>L'ensemble de l'équipe de <a href="http://mister-devis.com">www.mister-devis.com</a> vous remercie pour votre confiance</p>
					<p>Cordialement</p>
					<p style="margin-top: 40px">
						<strong>Georges KAPPLAN</strong><br>
						Directeur Commercial<br>
						<a href="mailto:georges.kapplan@mister-devis.com">georges.kapplan@mister-devis.com</a><br>
						09 88 77 27 00<br>
						<img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" width="80" />
					</p>
				</div>
        `
	};
	transport.sendMail(options, err => {
		if (err) throw err;
	});
};


const sendParticulierMail = async ({email_particulier, nom_particulier, prenom_particulier}, ref) => {
	if (!email_particulier) return null;
	
	const options = {
		from: sysEmail,
		to: email_particulier,
		subject: 'Votre projet est maintenant disponible en ligne',
		html: `
				<div style="width: 650px; margin: 10px auto;">
					<div style="text-align: center; padding: 10px;"><img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" /></div>
					<h1 style="background-color:#0184c2;padding: 50px;color:#fff;text-align: center; font-size:20px ">Votre projet est maintenant disponible en ligne</h1>
					<p>Bonjour ${prenom_particulier} ${nom_particulier},</p>
					<p>Nous vous remercions pour votre accueil lors de notre dernière conversation téléphonique.</p>
					<p>Nous vous confirmons que le Projet confié est actuellement en ligne et que nous avons informé de son existence l'ensemble de nos partenaires Professionnels à proximité de chez vous.</p>
					<p>Très rapidement vous aurez des demandes de rendez-vous d'Artisans afin de vous proposer gratuitement des devis.</p>
					<p>L'ensemble de l'équipe de <a href="http://www.mister-devis.com">www.mister-devis.com</a> vous remercie pour votre confiance</p>
					<p>Cordialement</p>
					
					<p style="margin-top: 50px">
						<strong>Georges KAPPLAN</strong><br><br>
						<span>
							Directeur Commercial<br> <a href="mailto:georges.kapplan@mister-devis.com">georges.kapplan@mister-devis.com</a><br> 09 88 77 27 00 </span>    <br><br>
						<img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" style="width: 80px" />
					</p>
				</div>
        `
	};
	transport.sendMail(options, err => {
		if (err) throw err;
	});
};

const sendOpMail = async ({email_user, firstname_user}, url, ref) => {
	if (!email_user) return null;
	
	const options = {
		from: sysEmail,
		to: email_user,
		subject: 'Confirmation de votre demande de devis',
		html: `
				<div style="width: 650px; margin: 10px auto;">
					<div style="text-align: center; padding: 10px;"><img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" /></div>
					<h1 style="background-color:#0184c2;padding: 50px;color:#fff;text-align: center;">Confirmation de votre demande de devis</h1>
					<p>Bonjour ${firstname_user},</p>
					<p>Nous vous confirmons la réception de votre demande de devis.</p>
					<p>Prochainement un de nos conseillers vous contactera afin de recueillir l'ensemble des informations concernant votre projet.</p>
					<h1>Demande N°: ${ref}</h1>
					<p><a href="${url}">Cliquez ici pour accèder au backoffice</a></p>

					<p>Cordialement</p>
					
					<p style="margin-top: 50px">
						<strong>Georges KAPPLAN</strong><br><br>
						<span>
							Directeur Commercial<br> <a href="mailto:georges.kapplan@mister-devis.com">georges.kapplan@mister-devis.com</a><br> 09 88 77 27 00 </span>    <br><br>
						<img src="http://www.webonline2018.com/resources_fo_ehcg/img/company_logo_1.jpg" style="width: 80px" />
					</p>
				</div>
        `
	};
	transport.sendMail(options, err => {
		if (err) throw err;
	});
};

app.get('/', (req, res) => {
	return res.status(403).send('<h1 style="font-size:46px; text-align: center">403 Forbidden</h1><hr />');
});


app.post('/', async (req, res) => {
	
	const {artisans, particuliers, ops, ref, url} = req.body;
	let i = 0, j = 0, k = 0;
	
	res.end(); // send back empty response
	
	// if there are particulier recepients we loop thru them
	if (particuliers && particuliers.length) {
		while (true) {
			if (i >= particuliers.length)
				break;
			
			
			const particulier = particuliers[i];
			
			if (typeof particulier !== "undefined") {
				if (particulier['email_particulier']) {
					await sleep(SLEEP_TIME); // waiting a bit before sending the next email
					sendParticulierMail(particulier, ref)
						.then(() => console.log(`${particulier['email_particulier']} particulier OK`))
						.catch(err => console.error(err));
				}
			}
			i++;
		}
	}
	
	// if there are artisan recepients we loop thru them
	if (artisans && artisans.length) {
		while (true) {
			if (j >= artisans.length)
				break;
			
			const artisan = artisans[j];
			
			if (typeof artisan !== "undefined") {
				if (artisan['email_artisan']) {
					await sleep(SLEEP_TIME); // waiting a bit before sending the next email
					sendArtisanMail(artisan, ref)
						.then(() => console.log(`${artisan['email_artisan']} artisan OK`))
						.catch(err => console.error(err));
				}
			}
			j++;
		}
	}
	
	
	// if there are operators recepients we loop thru them
	if (ops && ops.length) {
		while (true) {
			if (j >= ops.length)
				break;
			
			const op = ops[j];
			
			if (typeof op !== "undefined") {
				if (op['email_user']) {
					await sleep(SLEEP_TIME); // waiting a bit before sending the next email
					sendOpMail(op, url, ref)
						.then(() => console.log(`${op['email_user']} User OK`))
						.catch(err => console.error(err));
				}
			}
			j++;
		}
	}

	
});


app.post('/new-client', async (req, res) => {
	
	const {particuliers, ops, ref, url} = req.body;
	let i = 0, j = 0;
	
	res.end(); // send back empty response
	
	// if there are particulier recepients we loop thru them
	if (particuliers && particuliers.length) {
		while (true) {
			if (i >= particuliers.length)
				break;
			
			
			const particulier = particuliers[i];
			
			if (typeof particulier !== "undefined") {
				if (particulier['email_particulier']) {
					await sleep(SLEEP_TIME); // waiting a bit before sending the next email
					sendParticulierMailNew(particulier, ref)
						.then(() => console.log(`${particulier['email_particulier']} particulier OK`))
						.catch(err => console.error(err));
				}
			}
			i++;
		}
	}
	
	
	// if there are operators recepients we loop thru them
	if (ops && ops.length) {
		while (true) {
			if (j >= ops.length)
				break;
			
			const op = ops[j];
			
			if (typeof op !== "undefined") {
				if (op['email_user']) {
					await sleep(SLEEP_TIME); // waiting a bit before sending the next email
					sendOpMail(op, url, ref)
						.then(() => console.log(`${op['email_user']} User OK`))
						.catch(err => console.error(err));
				}
			}
			j++;
		}
	}
});

app.listen(PORT, () => console.log(`Server running on port ${PORT}`));