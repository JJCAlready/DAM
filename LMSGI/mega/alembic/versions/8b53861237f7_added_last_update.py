"""Added last update

Revision ID: 8b53861237f7
Revises: 
Create Date: 2019-09-25 20:02:02.969934

"""
from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision = '8b53861237f7'
down_revision = None
branch_labels = None
depends_on = None


def upgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.add_column('packages', sa.Column('latest_update', sa.DateTime(), nullable=True))
    op.create_index(op.f('ix_packages_latest_update'), 'packages', ['latest_update'], unique=False)
    # ### end Alembic commands ###


def downgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.drop_index(op.f('ix_packages_latest_update'), table_name='packages')
    op.drop_column('packages', 'latest_update')
    # ### end Alembic commands ###
