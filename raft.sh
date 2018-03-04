#!/bin/bash

api ()
{
    # $1 = url
    # $2 = data

    curl --user "RAFTAPI\V1" --header "Content-Type: application/json" --request POST --data '$2' $1
}

if [$1 = "add"]
then
    git "$@"
fi

if [$1 = "review"]
then
    if (($2 = "create"))
    then
        # check if current directory has a .git directory
        if ((grep -q ".git" $(pwd) ))
        then
            # check if server is set in config

        else
            # tell the user there isn't a .git directory here
        fi

        # creates a new review regardless if one already exists
    fi

    if (($2 = "update"))
    then
        # updates a review - fails if none found
    fi

    if (($2 = "link"))
    then
        # returns the link to the website of the review, fails if no review exists
    fi

    if (($2 = "fail"))
    then
        # git commit-id
        # copies fail-template.yml to .git/commit-id
        # opens nano, of a locally copy of the fail-template.yml
        # the user fills the fail-template.yml
        # the result is curled to the server
    fi

    if (($2 = "pass"))
    then
        # git commit-id
        # copies pass-template.yml to .git/commit-id
        # opens nano, of a locally copy of the pass-template.yml
        # the user fills the pass-template.yml
        # the result is curled to the server
    fi

    # create review if none found
fi

if [$1 = "timer"]
then
    if (($2 = "start"))
    then
        # starts timer
        # check if server is set in config
        # send curl request to start timer
        # show current stats if timer already started
    fi

    if (($2 = "stop"))
    then
        # stops timer
        # check if server is set in config
        # send curl request to stop timer
        # show stats of that session
    fi

    if (($2 = "link"))
    then
        # curl server to check if timer is started
        # if timer is started, curl server to get a link to the timer dashboard screen
    fi

    if (($2 = "status"))
    then
        # send curl request for timer stats
    fi
fi

if [$1 = "collab"]
then
    if (($2 = "start"))
    then
        # check if repo is a git repo
        # check if raft has a selected server or a .raft config set
        # check if repo is a repo on selected server
        # starts a cpp file that watches the directory as a process
        # curl server information

        # let user know that a collab session was created at: [url]
        # let the user know that they can set the session to public : (closed by default)
        # permissions follow same schema as that listed in truss notes repo
    fi

    if (($2 = "stop" ))
    then
        # check if cpp file is running as process -> end it
        # curl server information
    fi
fi

if [$1 = "haze"]
then
    if (($# = "3"))
    then
        # if three arguments are passed, assume they are:
        # haze, a server url, and a token

        # token should only last 5 minutes

        # curl server with token, check if available
        # curl response sends back the email and the hash id of the server
        # if available, create a ssh-key using the email response value

        # storing the key into the .git directory would be nice, but not sure if required.
        # I'll need to do more research as to how I should manage multiple keys.
        # Seems to me having the key stored in the .git directory may be best. /shrug
        # -N '' is for empty passphrase
        ssh-keygen -t rsa -b 4096 -C $email -f ~/.ssh/[server-hash-id].key -N ''
        eval `ssh-agent`
        ssh-add ~/.ssh/[server-hash-id].key

        # curl the public key to the server with the token from earlier
        # ie ~/.ssh/[server-hash-id].key.pub
    fi
fi

if [$1 = "server"]
then
    if (($2 = "select"))
    then
        # set ./.git/raft/selected-server.yml
    fi
fi
