#!/bin/sh
#
# Performs an initial import of a directory. This is the equivalent
# of doing 'git init; git add .; git commit'. It's a lot slower,
# but is meant to be a simple fast-import example.

if [ -z "$1" -o -z "$2" ]; then
	echo "usage: git-import branch import-message"
	exit 1
fi

USERNAME="$(git config user.name)"
EMAIL="$(git config user.email)"

if [ -z "$USERNAME" -o -z "$EMAIL" ]; then
	echo "You need to set user name and email"
	exit 1
fi

git init

(
	cat <<EOF
commit refs/heads/$1
committer $USERNAME <$EMAIL> now
data <<MSGEOF
$2
MSGEOF

EOF
	find * -type f|while read i;do
		echo "M 100644 inline $i"
		echo data $(stat -c '%s' "$i")
		cat "$i"
		echo
	done
	echo
) | git fast-import --date-format=now
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            The git-p4 script moved to the top-level of the git source directory.

Invoke it as any other git command, like "git p4 clone", for instance.

Note that the top-level git-p4.py script is now the source.  It is
built using make to git-p4, which will be installed.

Windows users can copy the git-p4.py source script directly, possibly
invoking it through a batch file called "git-p4.bat" in the same folder.
It should contain just one line:

    @python "%~d0%~p0git-p4.py" %*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    #!/usr/bin/perl
#
# Copyright 2008-2009 Peter Krefting <peter@softwolves.pp.se>
#
# ------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, see <http://www.gnu.org/licenses/>.
#
# ------------------------------------------------------------------------

=pod

=head1 NAME

import-directories - Import bits and pieces to Git.

=head1 SYNOPSIS

B<import-directories.perl> F<configfile> F<outputfile>

=head1 DESCRIPTION

Script to import arbitrary projects version controlled by the "copy the
source directory to a new location and edit it there"-version controlled
projects into version control. Handles projects with arbitrary branching
and version trees, taking a file describing the inputs and generating a
file compatible with the L<git-fast-import(1)> format.

=head1 CONFIGURATION FILE

=head2 Format

The configuration file is based on the standard I<.ini> format.

 ; Comments start with semi-colons
 [section]
 key=value

Please see below for information on how to escape special characters.

=head2 Global configuration

Global configuration is done in the B<[config]> section, which should be
the first section in the file. Configuration can be changed by
repeating configuration sections later on.

 [config]
 ; configure conversion of CRLFs. "convert" means that all CRLFs
 ; should be converted into LFs (suitable for the core.autocrlf
 ; setting set to true in Git). "none" means that all data is
 ; treated as binary.
 crlf=convert

=head2 Revision configuration

Each revision that is to be imported is described in three
sections. Revisions should be defined in topological order, so
that a revision's parent has always been defined when a new revision
is introduced. All the sections for one revision must be defined
before defining the next revision.

Each revision is assigned a unique numerical identifier. The
numbers do not need to be consecutive, nor monotonically
increasing.

For instance, if your configuration file contains only the two
revisions 4711 and 42, where 4711 is the initial commit, the
only requirement is that 4711 is completely defined before 42.

=pod

=head3 Revision description section

A section whose section name is just an integer gives meta-data
about the revision.

 [3]
 ; author sets the author of the revisions
 author=Peter Krefting <peter@softwolves.pp.se>
 ; branch sets the branch that the revision should be committed to
 branch=master
 ; parent describes the revision that is the parent of this commit
 ; (optional)
 parent=1
 ; merges describes a revision that is merged into this commit
 ; (optional; can be repeated)
 merges=2
 ; selects one file to take the timestamp from
 ; (optional; if unspecified, the most recent file from the .files
 ;  section is used)
 timestamp=3/source.c

=head3 Revision contents section

A section whose section name is an integer followed by B<.files>
describe all the files included in this revision. If a file that
was available previously is not included in this revision, it will
be removed.

If an on-disk revision is incomplete, you can point to files from
a previous revision. There are no restrictions on where the source
files are located, nor on their names.

 [3.files]
 ; the key is the path inside the repository, the value is the path
 ; as seen from the importer script.
 source.c=ver-3.00/source.c
 source.h=ver-2.99/source.h
 readme.txt=ver-3.00/introduction to the project.txt

File names are treated as byte strings (but please see below on
quoting rules), and should be stored in the configuration file in
the encoding that should be used in th