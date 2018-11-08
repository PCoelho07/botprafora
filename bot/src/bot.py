from telegram.ext import Updater, CommandHandler
import os
import requests as re
import logging

# Enable logging
logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
                    level=logging.INFO)

logger = logging.getLogger(__name__)


BOT_API_TOKEN = os.environ['BOT_API_TOKEN'];
if not BOT_API_TOKEN:
	raise Exception('Token was not provided')


def start(bot, update):
	me = bot.get_me()
	msg = "Opa, tudo bem, {}?\n".format(update.message.from_user.first_name)
	msg += 'Eu sou "{0}" e estou aqui pra te ajudar.\n'.format(me.first_name)
	msg += "Seu namorado te fez raiva? Conta pra mim!\n\n"

	bot.send_message(chat_id=update.message.chat_id, text=msg)

def error(bot, update, error):
    """Log Errors caused by Updates."""
    logger.warning('Update "%s" caused error "%s"', update, error)

def main():
	updater = Updater(BOT_API_TOKEN)

	dp = updater.dispatcher

	dp.add_handler(CommandHandler('start', start))

	dp.add_error_handler(error)

	updater.start_polling()
	updater.idle()



if __name__ == '__main__':
	main()


